<?php
/**
 * Controller of Authors datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 23.08.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;

class AuthorsController extends AppController {
    // controller variables
    public $paginate    = [
        'limit'     => 25,
        'order'     => [
            'name', 'forename', 'born', 'dead'   => 'asc'
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
	 * list all existing authors
	 *
	 * @return void
	 */
	public function index() {
		//
		$authors	= array();
        
        foreach( $this->paginate() as $author ) {
            $tempBorn   = $author->born;
            $tempDead   = $author->dead;
            
            // remove leading zeros from bornyear
            if( $tempBorn == "00000000" ) {
                $author->born       = "-";
            } else {
                // reset born attribute
                $author->born       = "";
                
                // bornday empty? 
                if( substr( $tempBorn, 6, 2 ) != "00" ) {
                    $author->born       = substr( $tempBorn, 6, 2 ) . ".";
                }
                
                // bornmonth empty?
                if( substr( $tempBorn, 4, 2 ) != "00" ) {
                    $author->born       .= substr( $tempBorn, 4, 2 ) . ".";
                }
                
                $author->born       .= ltrim( substr( $tempBorn, 0, 4 ) , "0" );
                
                // is year before the Nativity?
                if( $author->born_suffix == 0 ) {
                    $author->born    .= " v.Chr.";
                }
            }
            
            if( $tempDead == "00000000" ) {
                $author->dead       = "-";
            } else {
                // reset dead attribute
                $author->dead       = "";
                
                // deadday empty?
                if( substr( $tempDead, 6, 2 ) != "00" ) {
                    $author->dead   = substr( $tempDead, 6, 2 ) . ".";
                }
                
                // deadmonth empty?
                if( substr( $tempDead, 4, 2 ) != "00" ) {
                    $author->dead   .= substr( $tempDead, 4, 2 ) . ".";
                }
                
                // remove leading zeros from bornyear
                $author->dead       .= ltrim( substr( $tempDead, 0, 4 ) , "0" );
                
                // is year before the Nativity?
                if( $author->dead_suffix == 0 ) {
                    $author->dead   .= " v.Chr.";
                }
            }
            
            // move $author dataset into $authors set
            array_push( $authors, $author );
        }		
		
		// set all author datasets in view variable
		$this->set( 'dataset', $authors );
	}
	
	
	/**
	 * create a new author
	 *
	 * @return void
	 */
	public function create() {
		//
		$author		= $this->Authors->newEntity();
		
		//
		$this->set( 'dataset', $author );
		
		if( $this->request->is( 'post' ) ) {
			$author->name				= $this->request->data["authorname"];
			$author->forename			= $this->request->data["authorforename"];
			$author->born				= $this->request->data["authoryearofborn"];
			
			//
			if( $this->request->data["authormonthofborn"] != "00" ) {
				$author->born			.= $this->request->data["authormonthofborn"] . $this->request->data["authordayofborn"];
			} else {
				$author->born			.= "0000";
			}
			
			$author->born_suffix		= $this->request->data["authorsuffixyearofborn"];
			$author->dead				= $this->request->data["authoryearofdead"];
			
			//
			if( $this->request->data["authormonthofdead"] != "00" ) {
				$author->dead			.= $this->request->data["authormonthofdead"] . $this->request->data["authordayofdead"];
			} else {
				$author->dead			.= "0000";
			}
			
			$author->dead_suffix		= $this->request->data["authorsuffixyearofdead"];
			
			//
			$this->Authors->save( $author );
		}
	}
	
	
	/**
	 * edit an existing author
	 *
	 * @return void
	 */
	public function edit( $id ) {
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	    
	    // get author data
        $author             = $this->Authors->get( $id );
        
		// is post request send?
		if( $this->request->is( 'post' ) ) {
			// update data fields
			$author->id				= $this->request->data["authorid"];
			$author->name			= $this->request->data["authorname"];
			$author->forename		= $this->request->data["authorforename"];
			$author->born_suffix	= $this->request->data["authorsuffixyearofborn"];
			$author->dead_suffix	= $this->request->data["authorsuffixyearofdead"];
			
			// build day of born strings
			switch( strlen( $this->request->data["authordayofborn"] ) ) {
				case 0:
					$this->request->data["authordayofborn"]		= "00";
					break;
					
				case 1: 
					$this->request->data["authordayofborn"] 	= "0" . $this->request->data["authordayofborn"];
					break;
			}
			
			switch( strlen( $this->request->data["authormonthofborn"] ) ) {
				case 0:
					$this->request->data["authormonthofborn"]	= "00";
					break;
				case 1:
					$this->request->data["authormonthofborn"]	= "0" . $this->request->data["authormonthofborn"];
					break;
			}
			
			switch( strlen( $this->request->data["authoryearofborn"] ) ) {
				case 0:
					$this->request->data["authoryearofborn"]	= "0000";
					break;
				case 1:
					$this->request->data["authoryearofborn"]	= "000" . $this->request->data["authoryearofborn"];
					break;
				case 2:
					$this->request->data["authoryearofborn"]	= "00" . $this->request->data["authoryearofborn"];
					break;
				case 3:
					$this->request->data["authoryearofborn"]	= "0" . $this->request->data["authoryearofborn"];
					break;
			}
			
			// build day of dead strings
			switch( strlen( $this->request->data["authordayofdead"] ) ) {
				case 0:
					$this->request->data["authordayofdead"]		= "00";
					break;
					
				case 1: 
					$this->request->data["authordayofdead"] 	= "0" . $this->request->data["authordayofdead"];
					break;
			}
			
			switch( strlen( $this->request->data["authormonthofdead"] ) ) {
				case 0:
					$this->request->data["authormonthofdead"]	= "00";
					break;
				case 1:
					$this->request->data["authormonthofdead"]	= "0" . $this->request->data["authormonthofdead"];
					break;
			}
			
			switch( strlen( $this->request->data["authoryearofdead"] ) ) {
				case 0:
					$this->request->data["authoryearofdead"]	= "0000";
					break;
				case 1:
					$this->request->data["authoryearofdead"]	= "000" . $this->request->data["authoryearofdead"];
					break;
				case 2:
					$this->request->data["authoryearofdead"]	= "00" . $this->request->data["authoryearofdead"];
					break;
				case 3:
					$this->request->data["authoryearofdead"]	= "0" . $this->request->data["authoryearofdead"];
					break;
			}
			
			// set day of born and day of dead author attributes
			$author->born		= $this->request->data["authoryearofborn"] . $this->request->data["authormonthofborn"] . $this->request->data["authordayofborn"];
			$author->dead		= $this->request->data["authoryearofdead"] . $this->request->data["authormonthofdead"] . $this->request->data["authordayofdead"];
			
			// save data in database
			$this->Authors->save( $author ); 
		}
		// split born date in date components
		$author->bornday	= substr( $author->born, 6, 2 );
		$author->bornmonth	= substr( $author->born, 4, 2 );
		$author->bornyear	= substr( $author->born, 0, 4 );
		
		// split born date in date components
		$author->deadday	= substr( $author->dead, 6, 2 );
		$author->deadmonth	= substr( $author->dead, 4, 2 );
		$author->deadyear	= substr( $author->dead, 0, 4 );
		
		// set view variable
		$this->set( 'data', $author );
	}
	
	
	/**
	 * display details of an existing author
	 *
	 * @return void
	 */
	public function view( $id ) {
		// get specificly author data
		$author				= $this->Authors->get( $id );
		
		// date formating
		$author->borndate	= "";
		$author->deaddate	= "";
		
		// bornday empty?
		if( substr( $author->born, 6, 2 ) != "00" ) {
			$author->borndate	.= substr( $author->born, 6, 2 ) . ".";
		}
		
		// bornmonth empty?
		if( substr( $author->born, 4, 2 ) != "00" ) {
			$author->borndate	.= substr( $author->born, 4, 2 ) . ".";
		}
		
		// remove leading zeros from bornyear
		for( $i = 0; $i < 4; $i++ ) {
			if( substr( $author->born, $i, 1 ) != "0" ) {
				$author->borndate	.= substr( $author->born, $i, 1 );
			}
		}
		
		// is year before the Nativity?
		if( $author->born_suffix == 0 ) {
			$author->borndate	.= " v.Chr.";
		}
		
		// bornday empty?
		if( substr( $author->born, 6, 2 ) != "00" ) {
			$author->deaddate	.= substr( $author->dead, 6, 2 ) . ".";
		}
		
		// bornmonth empty?
		if( substr( $author->born, 4, 2 ) != "00" ) {
			$author->deaddate	.= substr( $author->dead, 4, 2 ) . ".";
		}
		
		// remove leading zeros from bornyear
		for( $i = 0; $i < 4; $i++ ) {
			if( substr( $author->born, $i, 1 ) != "0" ) {
				$author->deaddate	.= substr( $author->dead, $i, 1 );
			}
		}
		
		// is year before the Nativity?
		if( $author->dead_suffix == 0 ) {
			$author->deaddate	.= " v.Chr.";
		}
		
        // TODO: receive and display list of works
		
		$this->set( 'dataset', $author );
	}
	
	
	/**
	 * delete an existing author
	 *
	 * @return void
	 */
	public function delete( $id ) {
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
        
	    // load Models
	    $this->loadModel( 'AuthorsWorks' );
	    
	    // get author name
	    $author         = $this->Authors->get( $id );
        $author->name   = $author->forename . " " . $author->name;
        
	    $this->set( 'author', $author );
	    
	    // acknowledge check
	    if( $this->request->is( 'post' ) ) {
	        // is cancel clicked redirect
	        if( isset( $this->request->data["btnCancel"] ) ) {
	            $this->redirect( [ 'action' => 'index' ] );
            }
            
            // is deleting acknowledged
	        if( isset( $this->request->data["btnAck"] ) ) {
	            // get author data
	            $author            = $this->Authors->get( $this->request->data["authorid"] );

	            // delete all author data set in AuthorsWorks
	            $authorsWorks      = $this->AuthorsWorks->findByAuthorsId( $author->id );
                
                foreach( $authorsWorks as $authorWork ) {
                    $this->AuthorsWorks->delete( $authorWork );
                }
	            
	            // delete author data
	            $this->Authors->delete( $author );
                
                // redirect to index
                $this->redirect( [ 'action' => 'index' ] );
            }
	    } 
	}
	
	
	/**
	 * list all authors where includes search expression
	 *
	 * @return void
	 */
	public function search( $expr ) {
	    // TODO: list of authors which content $expr
	}
}
?>