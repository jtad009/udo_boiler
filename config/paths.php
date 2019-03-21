<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */

define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);
define('SHOUT_IMAGE_UPLOAD_PATH',WWW_ROOT . 'img');
define('SKOLE_LOGO',WWW_ROOT . 'img'.DS.'logo');
define('EXCEL_UPLOAD_PATH',WWW_ROOT . 'excel');
define('MIN_WITHDRAWAL_AMOUNT',5000);

define('APP_NAME','udo');
define('CLIENT',isset($_SESSION['Auth']['User']['company_name']) ? "Hi" : "");
//SMS SETTINGS
define('SEND_SMS', 'http://www.bulksmsnigeria.net/components/com_spc/smsapi.php?username=edutonia&password=1q2w3e4r5t6y&');
define('SMS_BALANCE', 'http://www.bulksmsnigeria.net/components/com_spc/smsapi.php?username=edutonia&password=1q2w3e4r5t6y&balance=true&');
define('SMS_UNIT_COST',3);
//Naira sysmbol
define('CURRENCY','&#8358;');
//Skole plans

define("WALLET_DEFAULT", "100");
define("EXPIRY_THRESHOLD", "100");
define("PO_THRESHOLD",15);
define("ITEM_THRESHOLD",10);
define('DEFAULT_RETAIL_MARKUP',0.1);
define('DEFAULT_WHOLESALE_MARKUP',0.1);
define('SUPPLIER_PAYMENT_THRESHOLD',15);
define("APP_LINK","udo.com");