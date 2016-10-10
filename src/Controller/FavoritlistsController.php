<?php
/**
 * Controller which user can administrate her own dissertations
 *
 * @author Tim Jaap <dev@ascony.de>
 * @version 1.0 (last update 15.08.2016)
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class FavoritlistsController extends AppController {
	/**
	 *
	 *
	 * @return void
	 */
	public function initialize() {
		parent::initialize();
	}
	
	
	/**
	 * 
	 */
	public function index() {
		//TODO
	}
	
	
	/**
	 * create a new favorit list
	 *
	 * @return void
	 */
	public function create() {
		//
		if( $this->request->is( 'post' ) ) {
			$newFavList			= $this->Favoritlists->newEntity();
			
			$newFavList->title	= $this->request->data["title"];
			$newFavList->type	= 1;
			
			$this->Favoritlists->save( $newFavList );
		}
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function getId() {
		//TODO
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function delete() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function edit() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function shared() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function addCitationToFavList( $citId ) {
		// logged or anonymous user?
		//if( $this->Auth->user() ) {
		if( $user ) {
			//TODO
		} else {
			// load current favoritlist from session
			$favList	= $this->request->session()->read( 'FavList.items' );
			
			// isn't citation on list?
			if( !in_array( $citId, $favList ) ) {
				// add citation item to favlist
				array_push( $favList, $citId );
				
				// replace favlist in session with new favlist
				$this->request->session()->write( 'FavList.items', $favList );
			}
		}
		
        // redirect to index of citations
        $this->redirect( Controller::referer() );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function removeCitationFromFavList( $citId ) {
		// logged or anonymous user?
		if( $user ) {
			// TODO
		} else {
			// load current favoritlist from session
			$favList	= $this->request->session()->read( 'FavList.items' );
			
			// remove given item from favoritlist
			unset( $favList[array_search( $citId, $favList )] );
			
			// replace favlist in session with new favlist
			$this->request->session()->write( 'FavList.items', $favList );
		}
		
		// redirect to index of citations
        $this->redirect( Controller::referer() );
	}
	
	
	/**
	 * 
	 */
	public function selectExport() {
		//TODO
	}
	
	
	/**
	 * 
	 */
	public function export( $listid ) {
		// load models
		$this->loadModel( 'Authors' );
		$this->loadModel( 'AuthorsWorks' );
		$this->loadModel( 'Citations' );
		$this->loadModel( 'CitationsFavoritlists' );
		$this->loadModel( 'Media' );
		$this->loadModel( 'Works' );
		
		// variables
		$data	= array();
		$source	= array();
		
		// set source list
		if( $listid > 0 ) {
			// build source list
			foreach( $this->CitationsFavoritlists->findByFavoritlistsId( '1' )->toArray() as $item ) {
				array_push( $source, array( 'id' => $item['citations_id'] ) );
			}
		} else {
			foreach( $this->request->session()->read( 'FavList.items' ) as $item ) {
				array_push( $source, array( 'id' => $item ) );
			}
		}
		
		// receive data
		foreach( $source as $item ) {
			// get citation data
			$citation	= $this->Citations->get( $item["id"] );
			
			// get work data
			$work		= $this->Works->get( $citation["work_id"] );
			
			// get authors data
			$authors	= array();
			
			foreach( $this->AuthorsWorks->findByWorksId( $work->id )->toArray() as $author ) {
				array_push( $authors, $this->Authors->get( $author["authors_id"] ) );
			}
			
			// store collected data in array
			array_push( $data, array(
					'citation'	=> $citation,
					'work'		=> $work,
					'authors'	=> $authors
			) );
		}
		
		$this->set( 'rows', $data );
		
		// export process init?
		if( $this->request->is( 'post' ) ) {
			// create file for bibliography
			$bibfile		= new File( TMP . DS . session_id() . '.bib', true );
			
			// create file for citations
			$citfile		= new File( TMP . DS . session_id() . '.txt', true );
			
			// create bibtext file (*.bib)
			foreach( $data as $item ) {
				// bibtex string
				$bibtex		= '';
				
				// get mediatyp data
				$media		= $this->Media->get( $item["work"]["media_id"] );
				
				// set bibtex type
				$bibtex		.= '@' . $media['bibtex'] . '{';
				
				// set bibtex linkname
				$bibtex		.= strtolower( substr( $item["authors"][0]["name"], 0, 3 ) ) . $item["work"]["year_of_publishing"] . ',' . "\n";
				
				// set author (optional for 'booklet', 'manual', 'misc' - not for 'proceedings' - otherwise required)
				if( $media['bibtex'] != 'proceedings' ) {
					// bibtex style
					$bibtex		.= 'author = {';
					
					$num		= count( $item["authors"] );
					// two or more authors
					if( $num > 1 ) {
						for( $i = 0; $i < $num - 1; $i++ ) {
							$bibtex		.= $item["authors"][$i]["forename"] . ' ' . $item["authors"][$i]["name"] . ', ';
						}
						
						// remove last comma
						$bibtex		= substr( $bibtex, 0 , -2 ) . ' and ' . $item["authors"][$num-1]["forename"] . ' ' . $item["authors"][$num-1]["name"];
					} else {
						$bibtex		.= $item["authors"][0]["forename"] . ' ' . $item["authors"][0]["name"];
					}
					
					$bibtex		.= '},' . "\n";
				}
				
				// set editor (optional for 'conference', 'incollection', 'inproceedings', 'proceedings' - display for 'book' or 'inbook' when author is empty)
				//$bibtex		.= 'editor = {}' . "\n";
				
				// set title (optional for 'misc' - otherwise required)
				$bibtex		.= 'title = {' . $item["work"]["title"] . '}' . "\n";
				
				// set volume (optional only for 'article', 'book', 'conference', 'inbook', 'incollection', 'inproceedings', 'proceedings')
				//$bibtex		.= 'volume = {}' . "\n";
				
				// set number (optional only for 'article', 'techreport' - optional as alternative for 'volume' for 'book', 'conference', 'inbook', 'incollection', 'inproceedings', 'proceedings')
				//$bibtex		.= 'number = {}' . "\n";
				
				// set journal (required only 'article')
				if( $media['bibtex'] == 'article' ) {
					$bibtex		.= 'journal = {' . $item["work"]["journal"] . '}' . "\n";
				}
				
				// set booktitle (required only 'conference', 'inbook', 'incollection', 'inproceedings')
				//$bibtex		.= 'booktitle = {}' . "\n";
				
				// set type (only optional for 'inbook', 'incollection', 'mastersthesis', 'phdthesis', 'techreport')
				//$bibtex		.= 'type = {}' . "\n";
				
				// set series (optional only for 'book', 'conference', 'inbook', 'incollection', 'inproceedings', 'proceedings')
				//$bibtex		.= 'series = {}' . "\n";
				
				// set chapter (required only 'inbook' - optional only 'incollection')
				//$bibtex		.= 'chapter = {}' . "\n";
				
				// set pages (required only 'inbook' - optional only 'article', 'conference', 'incollection', 'inproceedings')
				if( $media['bibtex'] == 'inbook' || $media['bibtex'] = 'article' || $media['bibtex'] = 'conference' || $media['bibtex'] = 'incollection' || $media['bibtex'] = 'inproceedings' ) {
					$bibtex		.= 'pages = {' . $item["work"]["total_volume"] . '}' . "\n";
				}
				
				// set publisher (require for 'book', 'inbook', 'incollection' - optional for 'conference', 'inproceedings', 'proceedings')
				if( $media['bibtex'] == 'book' || $media['bibtex'] == 'inbook' || $media['bibtex'] == 'incollection' || $media['bibtex'] == 'conference' || $media['bibtex'] == 'inproceedings' || $media['bibtex'] == 'proceedings' ) {
					$bibtex		.= 'publisher = {' . $item["work"]["publisher"] . '}' . "\n";
				}
				
				// set school (only required for 'mastersthesis', 'phdthesis')
				if( isset( $item["work"]["school"] ) && ( $media['bibtex'] == 'mastersthesis' || $media['bibtex'] == 'phdthesis' ) ) {
					$bibtex		.= 'school = {' . $item["work"]["school"] . '}' . "\n";
				}
				
				// set organization (only optional for 'conference', 'inproceedings', 'manual', 'proceedings')
				if( isset( $item["work"]["organization"] ) && ( $media['bibtex'] == 'conference' || $media['bibtex'] == 'inproceedings' || $media['bibtex'] == 'manual' || $media['bibtex'] == 'proceedings' ) ) {
					$bibtex		.= 'organization = {' . $item["work"]["organization"] . '}' . "\n";
				}
				
				// set address (not in 'article', 'misc', 'unpublished' - optional for otherwise)
				if( isset( $item["work"]["address"] ) && ( $media['bibtex'] != 'article' || $media['bibtex'] != 'misc' || $media['bibtex'] != 'unpublished' ) ) {
					$bibtex		.= 'address = {' . $item["work"]["address"] . '}' . "\n";
				}
				
				// set edition (only optional for 'book', 'inbook', 'incollection', 'manual')
				if( isset( $item["work"]["edition"] ) && ( $media['bibtex'] == 'book' || $media['bibtex'] == 'inbook' || $media['bibtex'] == 'incollection' || $media['bibtex'] == 'manual' ) ) {
					$bibtex		.= 'edition = {' . $item["work"]["edition"] . '}' . "\n";
				}
				
				// set month (optional for 'article', 'book', 'booklet', 'conference', 'inbook', 'incollection', 'inproceedings', 'manual', 'mastersthesis', 'misc', 'phdthesis', 'proceedings', 'techreport', 'unpublished')
				if( isset( $item["work"]["month"] ) ) {
					$bibtex		.= 'month = {' . $item["work"]["month"] . '}' . "\n";
				}				
				
				// set year of publish (optional for 'booklet', 'manual', 'misc', 'unpublished' - otherwise required)
				$bibtex		.= 'year = {' . $item["work"]["year_of_publishing"];
				
				if( $item["work"]["year_of_publishing_greater_null"] == 0 ) {
					$bibtex		.= 'v. Chr.';
				}
				
				$bibtex		.= '}' . "\n";
				
				// set note (only required for 'unpublished' - otherwise optional)
				if( $media['bibtex'] == 'unpublished' || isset( $media['media']["note"] ) ) {
					$bibtex		.= 'note = {' . $media['media']["note"] . '}' . "\n";
				}
				
				// set isbn (only optional for 'book')
				if( $media['bibtex'] == 'book' ) {
					$bibtex		.= 'isbn = {' . $item["work"]["ean_isbn"] . '}' . "\n";
				}
				
				// write into $bibfile
				$bibfile->write( $bibtex . "\n", 'a' );
				
				$citfile->write( $item["citation"] . "\n", 'a' );
			}
			
			// make ZIP file
			$zipfile			= new \ZipArchive();
			
			// is zip file openable then add files to archive
			if( $zipfile->open( TMP . DS . session_id() . '.zip', \ZipArchive::CREATE ) === TRUE ) {
				// add bib file to zip
				$zipfile->addFile( $bibfile->path, 'bibliography.bib' );
				
				// add cit file to zip
				$zipfile->addFile( $citfile->path, 'citations.txt' );
			}
			
			// close zip file to prepare for download 
			$zipfile->close();
			
			// load handle on zip file
			$zip = new File( TMP . DS . session_id() . '.zip', false );
			
			// send zip file
			$this->response->file( $zip->path, [ 'download' => true ], 'citationPackage.zip' );
			
			// TODO
			// clear files
			/*
			$bibfile->delete();
			$citfile->delete();
			$zip->delete();
			*/
		}
	}
	
	
	/**
	 * 
	 */
	public function getListOfFavitlists( $userid ) {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
        
		// load models
		$this->loadModel( 'FavoritlistsUsers' );
		$this->loadModel( 'CitationsFavoritlists' );
		
		// load all favoritlists of user with id
		$userFavLists		= $this->Favoritlists->findByUsersId( $userid );
		
		/*
		 * 1.) Hole eine Liste aller Favoritenliste des Users
		 * 2.) Nehme aus 
		 */
	}
}
?>