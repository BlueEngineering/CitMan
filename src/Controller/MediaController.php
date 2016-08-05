<?php
/**
 * Controller of Media datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 12.03.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;

class MediaController extends AppController {

	public function initialize() {
		parent::initialize();
		
		$this->loadComponent('Flash');
	}
	
	/**
	 * list all media
	 *
	 * @return array with name and description of existing media
	 **/
	public function index() {
		// set all called media datasets in view variable
		$this->set( 'media', $this->Media->find( 'all' ) );
	}
	
	
	/**
	 * create a new media
	 *
	 * @return array( bool as result of process, string with errormessage )
	 **/
	public function create() {
		// create media object instance
		$media		= $this->Media->newEntity();
		
		// set empty dataset to prevent error messages in views
		$this->set( 'dataset', $media );
		
		if( $this->request->is( 'post' ) ) {			
			// make objectmodels with JSON format
			$objMedia	= array();
			$objCit		= array();
			
			// fill structure of media objectmodel array with given data
			for( $i = 0; $i < count( $this->request->data["mediaAttrLabel"] ); $i++ ) {
				if( !empty( $this->request->data["mediaAttrLabel"][$i] ) ) {
					array_push( $objMedia, array(
							'label'			=> $this->request->data["mediaAttrLabel"][$i],
							'helptext'		=> $this->request->data["mediaAttrHelptext"][$i],
							'required'		=> $this->request->data["mediaAttrRequirefield"][$i],
							'format'		=> $this->request->data["mediaAttrTextform"][$i],
							//'minlength'		=> $this->request->data["mediaAttrMinlength"][$i],
							'maxlength'		=> $this->request->data["mediaAttrMaxlength"][$i],
							'bibtex'		=> $this->request->data["mediaAttrBibtexattr"][$i]
						)
					);
				}
			}
			
			// fill structure of citation objectmodel array with given data
			for( $i = 0; $i < count( $this->request->data["citAttrLabel"] ); $i++ ) {
				if( !empty( $this->request->data["citAttrLabel"][$i] ) ) {
					array_push( $objCit, array(
							'label'			=> $this->request->data["citAttrLabel"][$i],
							'helptext'		=> $this->request->data["citAttrHelptext"][$i],
							'required'		=> $this->request->data["citAttrRequirefield"][$i],
							'format'		=> $this->request->data["citAttrTextform"][$i],
							//'minlength'		=> $this->request->data["citAttrMinlength"][$i],
							'maxlength'		=> $this->request->data["citAttrMaxlength"][$i]
						)
					);
				}
			}
			
			// set entity attributes
			$media->name						= $this->request->data["medianame"];
			$media->description					= $this->request->data["mediadescription"];
			$media->objectmodel_media			= json_encode( $objMedia );
			$media->objectmodel_citation		= json_encode( $objCit );
			
			// save new mediatyp in database
			$this->Media->save( $media );
		}
	}
	
	
	/**
	 * edit an existing media
	 *
	 * @param $id, the unique identifier of media dataset
	 *
	 * @return array( bool with result of process, string with errormessage )
	 **/
	public function edit( $id = null ) {
		// load dataset from database
		$media			= $this->Media->get( $id );
		
		// update data if form is submitted
		if( $this->request->is( "post" ) ) {			
			// make objectmodels with JSON format
			$objMedia	= array();
			$objCit		= array();
			
			// prepare mediatyp data for json encode
			for( $i = 0; $i < count( $this->request->data["mediaAttrLabel"] ); $i++ ) {
				if( !empty( $this->request->data["mediaAttrLabel"][$i] ) ) {
					array_push( $objMedia, array(
							'label'			=> $this->request->data["mediaAttrLabel"][$i],
							'helptext'		=> $this->request->data["mediaAttrHelptext"][$i],
							'required'		=> $this->request->data["mediaAttrRequirefield"][$i],
							'format'		=> $this->request->data["mediaAttrTextform"][$i],
							//'minlength'		=> $this->request->data["mediaAttrMinlength"][$i],
							'maxlength'		=> $this->request->data["mediaAttrMaxlength"][$i],
							'bibtex'		=> $this->request->data["mediaAttrBibtexattr"][$i]
						)
					);
				}
			}
			
			// prepare citation data for json encode
			for( $i = 0; $i < count( $this->request->data["citAttrLabel"] ); $i++ ) {
				if( !empty( $this->request->data["citAttrLabel"][$i] ) ) {
					array_push( $objCit, array(
							'label'			=> $this->request->data["citAttrLabel"][$i],
							'helptext'		=> $this->request->data["citAttrHelptext"][$i],
							'required'		=> $this->request->data["citAttrRequirefield"][$i],
							'format'		=> $this->request->data["citAttrTextform"][$i],
							//'minlength'		=> $this->request->data["citAttrMinlength"][$i],
							'maxlength'		=> $this->request->data["citAttrMaxlength"][$i]
						)
					);
				}
			}
			
			// set dataset attributes
			$media->name					= $this->request->data["medianame"];
			$media->description				= $this->request->data["mediadescription"];
			$media->objectmodel_media		= json_encode( $objMedia );
			$media->objectmodel_citation	= json_encode( $objCit );
			
			//
			$this->Media->save( $media );
		}
		
		// decode json informations
		$media->objectmodel_media		= json_decode( $media["objectmodel_media"] );
		$media->objectmodel_citation	= json_decode( $media["objectmodel_citation"] );
		
		// case empty objectmodels
		if( count( $media->objectmodel_media ) < 1 ) {
			$media->objectmodel_media		= array();
		}
		
		if( count( $media->objectmodel_citation ) < 1 ) {
			$media->objectmodel_citation	= array();
		}
		
		// set form values
		$this->set( 'dataset', $media );
	}
	
	
	/**
	 * delete an existing media
	 *
	 * @param $id, the unique identifier of media dataset
	 *
	 * @return array( bool with result of process, string with errormessage )
	 **/
	public function delete( $id = null ) {
	}
	
	
	/**
	 * display a given form abstract to preview his design
	 *
	 * @param $str, display a preview of HTML form for new unsaved media dataset
	 *
	 * @return string with HTML form code
	 **/
	public function preview( $str = null ) {
	}
	
	
	/**
	 * call dataset of a specific media to display the structure
	 *
	 * @param $id, the unique identifier of media dataset
	 *
	 * @return array with dataset of given media
	 **/
	public function view( $id = null ) {
		//
		$media							= $this->Media->get( $id );
		$media["objectmodel_media"]		= json_decode( $media["objectmodel_media"] );
		$media["objectmodel_citation"]	= json_decode( $media["objectmodel_citation"] );
		
		$this->set( 'dataset', $media );
	}
	
	
	// ----- service methods -----
	
	// ToDo: Needed?
	
	/**
	 * get the fullname of a media
	 *
	 * @param $id, the unique identifier of media dataset
	 *
	 * @return string with name of given media
	 **/
	public function getName( $id = null ) {
	}
	
	
	/**
	 * get a list of all media
	 *
	 * @return array( int with id of media dataset, string with name of media dataset )
	 **/
	public function getList() {
	}
	
	
	/**
	 * export media informations for other controllers
	 *
	 * @param $id, the unique identifier of media dataset
	 *
	 * @return array with media attribut informations
	 **/
	public function getMediaStruct( $id = null ) {
	}
	
	
	/**
	 * export citation informations for other controllers
	 *
	 * @param $id, the unique identifier of citation dataset
	 *
	 * @return array with citation attribut informations
	 **/
	public function getCitStruc( $id = null ) {
	}
}
?>