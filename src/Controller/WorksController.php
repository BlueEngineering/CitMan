<?php
/**
 * Controller of Media datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 04.08.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class WorksController extends AppController {

	public function initialize() {
		parent::initialize();
		
		$this->loadComponent('Flash');
		//$this->loadComponent('JsonToForm');
	}
	
	/**
	 * list all existing works
	 *
	 **/
	public function index() {
		//
		
		$this->set( 'works', $this->Works->find( 'all' ) );
	}
	
	
	/**
	 * create a new works
	 *
	 **/
	public function create() {	
		// load required models
		$this->loadModel( 'media' );
		$this->loadModel( 'authors' );
		$this->loadModel( 'authors_works' );
		
		// call list of mediatyps
		$mediatyps	= $this->media->find( 'all', [
			'order' => 'media.name ASC'
		] )->toArray();
		
		// set list as template var
		$this->set( 'mediatypArray', $mediatyps );
		
		// date are submitted?
		if( $this->request->is( "post" ) ) {
/*
			echo '<pre>';
			print_r($this->request->data);
			echo '</pre>';
*/
			
			//echo $this->request->data["authorname"][1];
			
			// create new works object
			$works		= $this->Works->NewEntity();
			
			// set object attributes
			$works->media_id						= $this->request->data["workstyp"];
			$works->DOI								= $this->request->data["worksdoi"];
			$works->title							= $this->request->data["workstitle"];
			$works->journal							= $this->request->data["worksjournal"];
			$works->volume							= $this->request->data["worksvolume"];
			$works->editor							= $this->request->data["workseditor"];
			$works->publisher						= $this->request->data["workspublisher"];
			$works->year_of_publishing				= $this->request->data["worksyearofpublishing"];
			$works->year_of_publishing_greater_null	= $this->request->data["worksyearofpublishingsuffix"];
			$works->place_of_publishing				= $this->request->data["worksplaceofpublishing"];
			$works->total_volume					= $this->request->data["workstotalvolume"];
			$works->ean_isbn						= $this->request->data["workseanisbn"];
			$works->url_link						= $this->request->data["workslink"];
			$works->filename						= $this->request->data["worksfile"];
			
			// convert german timestamp format to datebase format (DD.MM.YYYY HH:MM -> YYYY-MM-DD HH:MM:SS)
			$works->url_timestamp					= substr( $this->request->data["workslinkcall"], 6, 4 ) . '-';		// year
			$works->url_timestamp					.= substr( $this->request->data["workslinkcall"], 3, 2 ) . '-';		// month
			$works->url_timestamp					.= substr( $this->request->data["workslinkcall"], 0, 2 ) . ' ';		// day
			$works->url_timestamp					.= substr( $this->request->data["workslinkcall"], 11, 2 ) . ':';
			$works->url_timestamp					.= substr( $this->request->data["workslinkcall"], 14, 2 ) . ':00';
			
			// save new work object in table and get his id
			if( $this->Works->save( $works ) ) {
				//echo $works->id;
			}
			
			// array for author objects
			$authors	= array();
			
			for( $i = 0; $i < count($this->request->data["authorname"]); $i++ ) {
				// empty name?
				if( empty( $this->request->data["authorname"][$i] ) ) {
					continue;
				}
				
				// create new author objects
				$author							= $this->authors->NewEntity();
				
				// is author already saved in database?
				$numAuthorByName				= $this->authors->findByName( $this->request->data["authorname"][$i] )->count();
				$numAuthorByNameAndForename		= $this->authors->findAllByNameAndForename( $this->request->data["authorname"][$i], $this->request->data["authorforename"][$i] )->count();
				
				// finding author by his name and forename
				if( $numAuthorByNameAndForename == 1 ) {
					// get author object from table
					$author		= $this->authors->find( 'all', [
									'conditions' => [
										'AND' => [
											'name LIKE'			=> $this->request->data["authorname"][$i],
											'forename LIKE'		=> $this->request->data["authorforename"][$i]
										]
									]
									] )->first()->toArray();
				}
				
				// finding author by his name for dataset with empty forename
				if( $numAuthorByNameAndForename == 0 && $numAuthorByName == 1 ) {
					// get author object from table
					$author		= $this->authors->find( 'all', [
									'conditions' => [
										'name LIKE'	=> $this->request->data["authorname"][$i]
									]
									] )->first()->toArray();
				}
				
				
				
				// special cases
				// ToDo: $numAuthorByNameAndForename > 1
				// ToDo: $numAuthorByNameAndForename == 0 && $numAuthorByName > 1
				
				// author isn't saved in database
				if( $numAuthorByName == 0 && $numAuthorByNameAndForename == 0 ) {
					// set author object attributes
					$author->name			= $this->request->data["authorname"][$i];
					$author->forename		= $this->request->data["authorforename"][$i];
					
					// convert birthday and day of death
					// ToDo: support for other dateformats
					if( !empty( $this->request->data["authordayofbirth"][$i] ) ) {
						$temp					= explode( '.', $this->request->data["authordayofbirth"][$i] );
						$author->born			= $temp[2] . $temp[1] . $temp[0];
					} else {
						$author->born			= "00000000";
					}
					
					if( !empty( $this->request->data["authordayofdead"][$i] ) ) {
						$temp					= explode( '.', $this->request->data["authordayofbirth"][$i] );
						$author->born			= $temp[2] . $temp[1] . $temp[0];
					} else {
						$author->dead			= "00000000";
					}
					
					$author->born_suffix	= $this->request->data["authorsuffixyearofbirth"][$i];
					$author->dead_suffix	= $this->request->data["authorsuffixyearofdead"][$i];
					
					// save dataset in database
					$this->authors->save( $author );
				}
				
				// remember author object for link between authors and work
				array_push( $authors, $author );
			}
			
			// set link between authors and work in database
			for( $i = 0; $i < count($authors); $i++ ) {
				//$authorToWork				= $this->authors_works->newEntity();
				$authorToWork				= TableRegistry::get( 'authors_works' )->newEntity();
				
				$authorToWork->authors_id	= $authors[$i]["id"];
				$authorToWork->works_id		= $works->id;
				
				$this->authors_works->save( $authorToWork );
				
				/*
				// debugging
				echo '<pre>';
				print_r( $authorToWork );
				echo '</pre>';
				*/
			}
			
			/*
			// debugging
			echo '<pre>';
			print_r($authors);
			echo '</pre>';
			*/
		}
		
		/*
		// JSON string
		$mtJson		= '[';
		
		foreach( $mediatyps as $mt ) {			
			// build string
			$mtJson		.= '{"id":' . $mt["id"] . ',"description":"' . $mt["description"] . '","objectmodel_media":' . $mt['objectmodel_media'] . '},';
		}
		
		// remove last char and set JSON array closed char
		$mtJson		= substr( $mtJson, 0, strlen( $mtJson )-1 ) . ']';
		
		$this->set( 'mediatypJson', $mtJson );
		*/
	}
	
	
	/**
	 *
	 *
	 **/
	public function view( $id ) {
	}
	
	
	/**
	 * edit an existing works
	 *
	 **/
	public function edit( $id ) {
	}
	
	
	/**
	 * return all works where including the search expression
	 *
	 **/
	public function search( $expr ) {
	}
}
?>
