<?php
/**
 * Controller of Synonyms datamodel
 *
 * @Author Tim Jaap <dev@ascony.de>
 * @Version 1.0 (last update 12.03.2016)
 */
 
namespace App\Controller;

use Cake\Controller\Controller;

class SynonymsController extends AppController {
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
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 */
	public function create() {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 */
	public function edit( $id ) {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 */
	public function delete() {
		// TODO
		$this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 */
	public function view( $id ) {
        // TODO
        $this->redirect( [ 'controller' => 'citations', 'action' => 'index' ] );
	}
	
	
	/**
	 * 
	 */
	public function search( $expr ) {
		// TODO
	}
}
?>