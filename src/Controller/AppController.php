<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 *
 * @author    Tim Jaap <dev@ascony.de> (extended code)
 * @version   1.0 (last update 15.08.2016)
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Auth\Auth;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();
        
        // load components
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        // init favList in session
        if( !$this->request->session()->check( 'FavList.items' ) ) {
        	$this->request->session()->write( 'FavList.listId', 2 );
        	$this->request->session()->write( 'FavList.items', array() );
        }
        
        // extends with auth component
		/*
        $this->loadComponent( 'Auth', [
			'loginAction'		=> [
				'controller'		=> 'Users',
				'action'			=> 'login'
			],
			'authError'			=> 'Du hast nicht die notwendigen Berechtigungen hierfür.',
			'authenticate'		=> [
				'Form'				=> [
					'fields'			=> [
						'username'			=> 'username',
						'password'			=> 'userpass'
					]
				]
			],
			'storage'			=> 'Session',
			'logoutRedirect'	=> [
				'controller'		=> 'Pages',
				'action'			=> 'display',
				'home'
			]
        ] );
        
        $this->Auth->allow( [ 'index', 'view' ] );
		*/
        
        // load models
    }
    
    /**
     * 
     */
    public function beforeFilter(Event $event) {
    	// User logged?
    	
    	// ACL Check
    	
    	// generate user specific menu
    	/*
    	 * 1.) latest four or less used favoritlists (latest = higher ids in table 'citations_favoritlists').
    	 * --> Call favoritlist function
    	 * --> return array. array element ( 'favListName, 'NumOfEntries' )
    	 * 2.) first entry = current selected favoritlist = name of selected favoritlist display in menubar and on top position of list)
    	 * --> setting in step 1 
    	 * 3.) set list contained var $favListItems and $curFavList
    	 * --> display in view
    	 */
    	
    	//
    	/*
    	$this->loadModel( 'Favoritlists' );
    	$userFavLists		= $this->Favorlists->getListOfFavitlists( 2 );
    	*/
    	
    	//if( $ )
    	
    	$this->set( 'exampleName', 'Meine Favoritenliste' );
    	$this->set( 'numOfFavListItems', count( $this->request->session()->read( 'FavList.items' ) ) );
    	//$this->set( 'numOfFavListItems', $numFavItems );
    }
    
    
    /**
     * 
     */
    public function afterFilter(Event $event) {
    }
    

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    
    /**
     * 
     */
    public function afterRender(Event $event) {
    }
}
