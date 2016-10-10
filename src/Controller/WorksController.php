<?php
/**
 * Controller of Works datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 23.08.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;

class WorksController extends AppController {
    // controller variables
    public $paginate    = [
        'limit'     => 25,
        'order'     => [
            'title', 'year_of_publishing', 'year_of_publishing_greater_null' => 'asc'
        ]
    ];
    
    
    /**
     * init all components
     *
     * @return void
     */
	public function initialize() {
		parent::initialize();
		
		$this->loadComponent('Flash');
        $this->loadComponent('Paginator');
	}
	
    
	/**
	 * list all existing works
	 *
     * @return void
	 **/
	public function index() {
	    // load models
	    $this->loadModel( 'AuthorsWorks' );
        $this->loadModel( 'Authors' );
	    
		// init variables
		$works                = array();
        
        foreach( $this->paginate() as $work ) {
            // init extra attribute
            $work->authors        = array();
            
            // get with works linked author ids
            $authorsWork        = $this->AuthorsWorks->findByWorksId( $work->id );
            
            // authors are set?
            if( $authorsWork->count() > 0 ) {
                foreach( $authorsWork->toArray() as $authorOfWork ) {
                    // get author data
                    $author         = $this->Authors->get( $authorOfWork->authors_id );
                    
                    // add author in array
                    array_push( $work->authors, array( "id" => $author->id, "name" => $author->forename . " " . $author->name ) );
                }
            } else {
                // add default author in array
                array_push( $work->authors, array( "id" => 0, "name" => "unbekannter Autor" ) );
            }
            
            // put work entity in works set
            array_push( $works, $work );
        }
        
        // set view variable
		$this->set( 'works', $works );
	}
	
	
	/**
	 * create a new works
	 *
     * @return void
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
				// TODO: $numAuthorByNameAndForename > 1
				// TODO: $numAuthorByNameAndForename == 0 && $numAuthorByName > 1
				
				// author isn't saved in database
				if( $numAuthorByName == 0 && $numAuthorByNameAndForename == 0 ) {
					// set author object attributes
					$author->name			= $this->request->data["authorname"][$i];
					$author->forename		= $this->request->data["authorforename"][$i];
					
					// convert birthday and day of death
					// TODO: support for other dateformats
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
			}
		}
	}
	
	
	/**
	 * display details of work
	 *
     * @return void
	 **/
	public function view( $id ) {
	    // get data of work from database
	    $this->Works->get( $id );
        
        // set view variable
        $this->set( 'works', $works );
	}
	
	
	/**
	 * edit an existing works
	 *
     * @return void
	 **/
	public function edit( $id ) {
	    // TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
    
    
    /**
     * delete an existing work entry
     * 
     * @return void
     */
	public function delete( $id ) {
	    // TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	/**
	 * return all works where including the search expression
	 *
     * @return void
	 **/
	public function search( $expr ) {
	    // TODO
	}
}
?>