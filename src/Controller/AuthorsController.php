<?php
/**
 * Controller of Authors datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 12.03.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Mailer\Email;

class AuthorsController extends AppController {

	public function initialize() {
		parent::initialize();
		
		$this->loadComponent('Flash');
	}
	
	
	/**
	 * list all existing authors
	 *
	 */
	public function index() {
		//
		$authors	= array();
		
		// receive all author datasets from database and reformat dates
		foreach( $this->Authors->find( 'all' ) as $author ) {
			$arr["id"]			= $author->id;
			$arr["forename"]	= $author->forename;
			$arr["name"]		= $author->name;
			
			// date formating
			$arr["borndate"]	= "";
			$arr["deaddate"]	= "";
			
			// bornday empty?
			if( substr( $author->born, 6, 2 ) != "00" ) {
				$arr["borndate"]	.= substr( $author->born, 6, 2 ) . ".";
			}
			
			// bornmonth empty?
			if( substr( $author->born, 4, 2 ) != "00" ) {
				$arr["borndate"]	.= substr( $author->born, 4, 2 ) . ".";
			}
			
			// remove leading zeros from bornyear
			for( $i = 0; $i < 4; $i++ ) {
				if( substr( $author->born, $i, 1 ) != "0" ) {
					$arr["borndate"]	.= substr( $author->born, $i, 1 );
				}
			}
			
			// is year before the Nativity?
			if( $author->born_suffix == 0 ) {
				$arr["borndate"]	.= " v.Chr.";
			}
			
			// deadday empty?
			if( substr( $author->dead, 6, 2 ) != "00" ) {
				$arr["deaddate"]	.= substr( $author->dead, 6, 2 ) . ".";
			}
			
			// deadmonth empty?
			if( substr( $author->dead, 4, 2 ) != "00" ) {
				$arr["deaddate"]	.= substr( $author->dead, 4, 2 ) . ".";
			}
			
			// Test if leading zero can ignored
			/*
			if( substr( $author->dead, 4, 2 ) == 7 ) {
				echo "yes";
			}
			*/
			
			// remove leading zeros from bornyear
			for( $i = 0; $i < 4; $i++ ) {
				if( substr( $author->dead, $i, 1 ) != "0" ) {
					$arr["deaddate"]	.= substr( $author->dead, $i, 1 );
				}
			}
			
			// is year before the Nativity?
			if( $author->dead_suffix == 0 ) {
				$arr["deaddate"]	.= " v.Chr.";
			}
			
			array_push( $authors, $arr );
		}
		
		// set all author datasets in view variable
		$this->set( 'dataset', $authors );
	}
	
	
	/**
	 * create a new author
	 *
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
	 */
	public function edit( $id ) {
	}
	
	
	/**
	 * display details of an existing author
	 *
	 */
	public function view( $id ) {
		//
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
		
		
		$this->set( 'dataset', $author );
	}
	
	
	/**
	 * delete an existing author
	 *
	 */
	public function delete( $id ) {
	}
	
	
	/**
	 * list all authors where includes search expression
	 *
	 */
	public function search( $expr ) {
	}
}
?>