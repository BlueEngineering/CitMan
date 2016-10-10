<?php
/**
 * Controller which user can administrate her own dissertations
 *
 * @author Tim Jaap <dev@ascony.de>
 * @version 1.0 (last update 15.08.2016)
 */

namespace App\Controller;

use Cake\Controller\Controller;

class UserrightsController extends AppController {
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
	 *
	 * @return void
	 */
	public function setUserright ( $id, $ur ) {
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function getUserright( $id, $ur ) {
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 *
	 *
	 * @return void
	 */
	public function getAllUserrigts( $id ) {
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
}
?>