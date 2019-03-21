<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * DecideUser component
 */
class RememberComponent extends Component {

    use \Cake\Log\LogTrait;

    /**
     * Default configuration.
     *
     * @var array
     */
    public $components = ['Cookie'];
    protected $_defaultConfig = [];
    public $controller;
    private $_cypherKey = 'jhkjhkjhgjehjh43u58934598359809252hkjh985uehfsdjfaiyr23423u94u09roi9u59043587utoihgkfhget9ew843578349583454353itrkgerg';
    private $__cookieName = 'secret';

//    public function initialize(Controller $controller) {
//        parent::initialize($controller);
//        $this->controller = $controller;
//        $this->_cypherKey = Configure::read('Security.salt');
//    }

    public function rememberMe($userData = null, $interval = "14 Days") {
        if (!empty($userData)) {

            $encryptedData = Security::cipher($userData, $this->_cypherKey);
            $this->Cookie->write($this->__cookieName, $encryptedData, false, $interval);
        }
    }

    public function getRememberedUser() {
        $cookieData = $this->Cookie->read($this->__cookieName);
        if (!empty($cookieData)) {
            $data = Security::cipher($cookieData, $this->_cypherKey);
            return $data;
        } else {
            return false;
        }
    }

    public function removeRemeberedUser() {
        $this->Cookie->delete($this->__cookieName);
    }

}
