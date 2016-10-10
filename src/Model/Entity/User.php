<?php
/**
 * Controller of User datamodel
 *
 * @author Tim Jaap <dev@ascony.de>
 * @version 1.0 (last update 15.08.2016)
 */

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity {

    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword( $password ) {
        return (new DefaultPasswordHasher)->hash( $password );
    }
}
?>