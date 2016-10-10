<?php
/**
 * Controller of Tags datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 12.03.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;

class TagsController extends AppController {
	/**
	 * 
	 */
	public function initialize() {
		parent::initialize();
	}
	
	
	/**
	 * list all existing tags
	 */
	public function index() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * create a new tag
	 */
	public function create() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * edit an existing tag
	 */
	public function edit( $id ) {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 * @param unknown $id
	 */
	public function view( $id ) {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * return all tags where including the search expression
	 */
	public function search( $expr ) {
	}
}
?>