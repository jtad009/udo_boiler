<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * DecideUser component
 */
class DecideUserComponent extends Component {
use \Cake\Log\LogTrait;
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
/**
 * Decide where to send user to
 * @param type $user
 * @return Array|null
 */
    public function redirects($user) {
        $response = null;
               // debug(array_keys($user));
        $this->Log($user,'info');
        switch ($user['role']) {
            case 'SYS_ADMIN':
                $response = ['controller' => 'schools', 'action' => 'index','prefix'=>'super'];
                break;
            case 'ADMIN':
                $response = ['controller' => 'users', 'action' => 'index'];
                break;
            
            case 'SALES':
                $response = ['controller' => 'sales', 'action' => 'index', 'prefix' => 'sale'];
                break;
            case 'INVENTORY':
                $response = ['controller' => 'items', 'action' => 'index', 'prefix' => 'inventory'];
                break;
            // default:
            //         $response =  ['controller' => 'users', 'action' => 'view', 'prefix' => 'clients',base64_encode($user['id'])];
        }
        return $response;
    }

}
