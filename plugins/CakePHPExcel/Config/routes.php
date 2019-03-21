<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * Note: Router::setExtensions() is available since CakePHP 2.2
 * If you use 2.1 dont load this routes file, and add pdf to your parseExtensions() in app/Config/routes.php
 */
// Router::parseExtensions();
Router::extensions('xlsx');
// Router::setExtensions(array('xlsx', 'xls'));