<?php
/**
 * Controller of Citations datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.01 (last update 05.08.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class CitationsController extends AppController {

	public function initialize() {
		parent::initialize();
		
		$this->loadComponent('Flash');
	}
	
	// list all existing citations
	public function index() {
		// loading external models
		$this->loadModel( 'Works' );
		$this->loadModel( 'AuthorsWorks' );
		$this->loadModel( 'Authors' );
		$this->loadModel( 'CitationsTags' );
		$this->loadModel( 'Tags' );
		
		// view data variable
		$rows		= array();
		
		// put citations in data variable and get linked data from other tables
		foreach( $this->Citations->find( 'all' ) as $citation ) {
			$data				= array();
			
			// put citation data in view dataset			
			$data["id"]			= $citation["id"];
			$data["citation"]	= $citation["citationtext"];
			$data["markdown"]	= $citation["markdown"];
			$data["position"]	= $citation["position"];
			
			// get work data
			$work				= $this->Works->get( $citation["work_id"] );			
			$data["work"]		= array( "id" => $citation["work_id"], "title" => $work["title"] );
			
			// create new array for author objects
			$data["authors"]	= array();
			
			// get with work linked authors
			$authorsWorks		= $this->AuthorsWorks->findByWorksId( $work["id"] );
			
			// get author data
			if( $authorsWorks->count() > 0 ) {				
				// get author object attributs
				foreach( $authorsWorks->toArray() as $authorOfWork ) {
					// get author data from database
					$author			= $this->Authors->get( $authorOfWork["authors_id"] );
					
					// add author array to data
					array_push( $data["authors"], array( "id" => $author->id, "name" => $author->forename . ' ' . $author->name ) );
				}
				
			} else {
				// dummy author object
				array_push( $data["authors"], array( "id" => 0, "name" => "unbekannter Autor" ) );
			}
			
			
			// create new array for tag objects
			$data["tags"]		= array();
			
			// get with citation linked tags
			$citationTags	= $this->CitationsTags->findByCitationsId( $citation["id"] );
			
			// get tag data
			if( $citationTags->count() > 0 ) {
				// built tags as array elements
				foreach( $citationTags->toArray() as $tagsOfCitation ) {				
					// get data of current tag
					$tag	= $this->Tags->get( $tagsOfCitation["tags_id"] );
					
					array_push( $data["tags"], array( "id" => $tag->id, "name" => $tag->name ) );
				}
			}
			
			// add citation object as array element
			array_push( $rows, $data );
		}
		
		// set view variables
		$this->set( 'rows', $rows );
	}
		
	
	// create a new citation
	public function create() {
		// loading external models
		$this->loadModel( 'media' );
		$this->loadModel( 'authors' );
		$this->loadModel( 'authors_works' );
		$this->loadModel( 'works' );
		$this->loadModel( 'tags' );
		$this->loadModel( 'citations_tags' );
		$this->loadModel( 'citations_dissertations' );

		// is post request send?
		if( $this->request->is( "post" ) ) {
			// iterate over all given citations
			for( $i = 0; $i < count( $this->request->data["citContent"] ) - 1; $i++ ) {
				// create a new citation entity
				$citation				= $this->Citations->newEntity();
				
				// set citation entity attributes
				$citation->work_id		= $this->request->data["worksid"];
				$citation->position		= trim( $this->request->data["citPosition"][$i] );
				$citation->citationtext	= trim( $this->request->data["citContent"][$i] );
				$citation->markdown		= $this->request->data["citMarkdown"][$i];
				
				// save new entity in table
				if( $this->Citations->save( $citation ) ) {
					$citationId			= $citation->id;
				}

				// ---- set link between citation and current selected dissertation
				// ToDo: current selected dissertation id as session variable
				// create new citation to dissertation relation entity
				$citOfDis						= TableRegistry::get( 'citations_dissertations' )->newEntity();

				// set attributes
				$citOfDis->dissertations_id		= 1;
				$citOfDis->citations_id			= $citationId;
				
				// save entity in database
				if( $this->citations_dissertations->save( $citOfDis ) ) {
					$citOfDisId			= $citOfDis->id;
				}
				
				// ---- set tags ----
				// split tags in separate array items
				$temp					= explode( ",", $this->request->data["citTags"][$i] );
				
				// iterate over all given tags
				for( $j = 0; $j < count( $temp ); $j++ ) {
					// check if given tag empty
					if( !empty( $temp[$j] ) && strlen( $temp[$j] ) > 1 ) {
						// create a new tag entity
						$tag			= $this->tags->newEntity();
						
						// check is given tag already saved in database
						$tempTag		= $this->tags->findByName( $temp[$j] );
						
						if( $tempTag->count() > 0 ) {
							// get tag data from database
							$tag->id	= $tempTag->toArray()[0]->id;
							$tag->name	= $tempTag->toArray()[0]->name;
							
							// temp id
							$tagId		= $tag->id;
						} else {
							// set tag entity attributes
							$tag->name		= $temp[$j];
							
							// save new tag entity in database
							if( $this->tags->save( $tag ) ) {
								$tagId		= $tag->id;
							}
						}
						
						// create a new relation entity
						$tagsOfCit		= TableRegistry::get( 'citations_tags' )->newEntity();
						// set relation entity attributes
						$tagsOfCit->citations_id	= $citationId;
						$tagsOfCit->tags_id			= $tagId;
						
						// save new relation entity in database
						if( $this->citations_tags->save( $tagsOfCit ) ) {
							$tagsOfCitId			= $tagsOfCit->id;
						}
					}
				}
			}
		}
		
		// load all titles of existing works
		$worksTitleList		= $this->works->find( 'all' )->toArray();
		$jsTitleList		= "[";
		
		// build JSON objects
		for( $i = 0; $i < count( $worksTitleList ); $i++ ) {
			// get authors
			$authorsOfWork	= $this->authors_works->findByWorksId( $worksTitleList[$i]->id );
			
			// create string with title and authornames
			$title			= $worksTitleList[$i]->title . " (";
			
			foreach( $authorsOfWork as $authorId ) {
				$author		= $this->authors->get( $authorId->authors_id );
				
				// forename isn't empty
				if( !empty( $author->forename ) ) {
					$title	.= $author->forename . " ";
				}
				
				$title		.= $author->name . ", ";
			}
			
			if( $authorsOfWork->count() > 0 ) {
				$title		= substr( $title, 0, strlen( $title ) - 2 );
			} else {
				$title		.= "Autor*in unbekannt";
			}
			
			$title			.= ")";
			
			
			// build element of JSON object
			$jsTitleList	.= '{';
			// set title as value
			$jsTitleList	.= '"value":"' . $title . '",';
			// set title as label
			$jsTitleList	.= '"label":"' . $title . '",';
			// set works id as JSON id
			$jsTitleList	.= '"id":"'  . $worksTitleList[$i]->id . '"';
			
			$jsTitleList	.= '}';
			
			//
			if( $i != count( $worksTitleList ) - 1 ) {
				$jsTitleList	.= ',';
			}
		}
		
		$jsTitleList		.= "]";
		
		// set view variables
		$this->set( 'data', $media );
		$this->set( 'jsWorkTitles', $jsTitleList );
		
	}
	
	
	// edit an existing citation
	public function edit( $id ) {
		/**
		 * ToDo:
		 1.) Änderungen an Zitaten werden versioniert.
		 	=> Neues Zitat + Timestamp in Datenbank
		 2.) In Favoritenliste des Benutzers das alte Zitat durch die neue Version ersetzen.
		 	=> Lösche Link auf altes Zitat und speicher Link auf neues Zitat in Favoritenliste.
		 */
	}
	
	
	//
	public function view( $id ) {
		/**
		ToDo:
		1.) Daten des Zitats anzeigen
		2.) Informationen zum Werk anzeigen
		3.) Versionen des Zitats auflisten
		4.) Links zu verwandten Zitaten setzen (verwandt über Version, Tags oder Werk)
		*/
	}
	
	
	// return all citations where including the search expression
	public function search( $expr ) {
	}
	
	
	// test
	public function ajaxGetCitationsByWorksId() {
		return "fubar";
	}
	
	
	// list all existing citations (JSON format)
	/*
	public function indexJSON() {
		// loading external models
		$this->loadModel( 'Works' );
		$this->loadModel( 'AuthorsWorks' );
		$this->loadModel( 'Authors' );
		$this->loadModel( 'CitationsTags' );
		$this->loadModel( 'Tags' );
		
		// view data variable as JavaScript array with JavaScript objects as array elements
		$data			= '[';
		
		// put citations in data variable and get linked data from other tables
		foreach( $this->Citations->find( 'all' ) as $citation ) {
			// start new JS object as new JS array element
			$data		.= '{';
			
			// put citation data in view dataset
			$data		.= 'id:' . $citation["id"] . ',';
			$data		.= 'citation:"' . $citation["citationtext"] . '",';
			$data		.= 'markdown:"' . $citation["markdown"]  . '",';
			$data		.= 'position:"' . $citation["position"] . '",';
			
			// get work data
			$work		= $this->Works->get( $citation["work_id"] );
			$data		.= 'work:{id:' . $citation["work_id"] . ',name:"' . $work["title"] . '"},';
						
			// create new JS array for author objects
			$data		.= 'authors:[';
			
			// get with work linked authors
			$authorsWorks		= $this->AuthorsWorks->findByWorksId( $work["id"] );
			
			// get author data
			if( $authorsWorks->count() > 0 ) {				
				// get JS author object attributs
				foreach( $authorsWorks->toArray() as $authorOfWork ) {
					// get author data from database
					$author			= $this->Authors->get( $authorOfWork["authors_id"] );
					
					// build JS author objects
					$data	.= '{';
					
					// set author id in JS author object
					$data		.= 'id:' . $author->id . ',';
					$data		.= 'name:"' . $author->forename . ' ' . $author->name . '"';
					
					// close JS author object
					$data	.= '},';
				}
				
			} else {
				// dummy JS author object
				$data		.= '{id:0,name:"unbekannter Autor"},';
			}
			
			// close JS author array
			$data			= substr( $data, 0, strlen( $data ) - 1 ) . '],';
			
			// create new JS array for tag objects
			$data			.= 'tags:[';
			
			// get with citation linked tags
			$citationTags	= $this->CitationsTags->findByCitationsId( $citation["id"] );
			
			// get tag data
			if( $citationTags->count() > 0 ) {
				// built tags as JS objects
				foreach( $citationTags->toArray() as $tagsOfCitation ) {				
					// get data of current tag
					$tag	= $this->Tags->get( $tagsOfCitation["tags_id"] );
					
					// open JS tag object
					$data	.= '{';
					
					// set JS tag attributes
					$data	.= 'id:' . $tag->id . ',name:"' . $tag->name . '"';
					
					// close JS tag object
					$data	.= '},';
				}
			} else {
				$data	.= ' ';
			}
			
			// close JS tag array
			$data		= substr( $data, 0, strlen( $data) - 1 ) . "]";
			
			// close JS citation object
			$data		.= "},";
		}
		
		// delete last char of JS string and close JS array
		$data		= substr( $data, 0, strlen( $data ) - 1 ) . "]";
		
		// set view variables
		$this->set( 'citations', $data );
	}
	*/
}
?>
