<?php
/**
 * Controller of User datamodel
 *
 * @author Tim Jaap <dev@ascony.de>
 * @version 1.0 (last update 15.08.2016)
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController {
	/**
	 *
	 *
	 */
	public function initialize() {
		parent::initialize();
	}
	
	
	/**
	 * method to login with username and password
	 *
	 * @param String username	given username
	 * @param String userpass	given password of user
	 * @return void 
	 */
	public function login() {
		if( $this->request->is( 'post' ) ) {
			$user	= $this->Auth->identify();
			
			echo '<pre>';
			//print_r( $this->request->data );
			print_r( $this->Auth->identify() );
			echo '<br />';
			//print_r( $this->Auth );
			print_r( $this->Auth->user() );
			echo '</pre>';
			
			if( $user ) {
				$this->Auth->setUser( $user );
				echo "Alles schick!";
			} else {
				echo "Bist raus!";
			}
		}
	}
	
	
	/**
	 * method to logout a logged user
	 *
	 * @return http redirection
	 */
	public function logout() {
		return $this->redirect( $this->Auth->logout() );
	}
	
	
	/**
	 * build user specific navbar
	 *
	 * @return void
	 */
	public function buildUsernavbar() {
		//TODO
	}
	
	
	/**
	 * create a new user account
	 *
	 * @param
	 * @return void
	 */
	public function create() {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 * method which users can change her password
	 *
	 * @return void
	 */
	public function changePassword() {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 * edit data of user profile
	 *
	 * @return void
	 */
	public function editProfile() {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	// ----- only administrator functions -----//
	
	/**
	 * authorized users can ban other users.
	 *
	 * @param int id	the identifier of user which account are
	 * @return void
	 */
	public function ban( $id ) {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 * activate a inactive user account (can called by user himself or by an administrator)
	 *
	 * @param int id 	the identifier of user which account deban
	 * @return void
	 */
	public function deban( $id ) {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 * activate a inactive user account (can called by user himself or by an administrator)
	 *
	 * @param int id 	the identifier of user which account set active
	 * @return void
	 */
	public function setActive( $id ) {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
	
	
	/**
	 * deactivate a active user account (can called by user himself or by an administrator)
	 *
	 * @param int id 	the identifier of user which account set inactive
	 * @return void
	 */
	public function setInactive() {
		//TODO
        // TODO: authorization check
        $this->redirect( [ 'action' => 'index' ] );
	}
}
?>