<?php
/**
 * Date: 06/02/15
 * Time: 19:51
 * Author: HJW88
 */

/*** error reporting on ***/
ini_set("log_errors", 1);
ini_set("error_log", __SITE_PATH . "/error.log");
error_reporting(E_ALL);

/*** include the controller class ***/
include __SITE_PATH . '/application/' . 'BaseController.class.php';

/*** include the registry class ***/
include __SITE_PATH . '/application/' . 'Registry.class.php';

/*** include the router class ***/
include __SITE_PATH . '/application/' . 'Router.class.php';

/*** include the template class ***/
include __SITE_PATH . '/application/' . 'Template.class.php';

/*** auto load model classes
 * After the application includes,
 * the __autoload function will immediately follow to load class
 * definition files automatically when they are required by the system.
 ***/
function __autoload($class_name)
{
    $filename = $class_name. '.class.php';
    $file1 = __SITE_PATH . '/model/' . $filename;
    $file2 = __SITE_PATH . '/controller/' . $filename;

    $file = file_exists($file1) ? $file1 : $file2;
    if (file_exists($file) == false) {
        error_log('Error __autoload() ' . $class_name. $file);
        return false;
    }
    include($file);
}

/*** a new registry object ***/
$registry = new registry;

/*** DB Credential ***/
define('__DB_HOST','dbcip.cs.uni-duesseldorf.de');
define('__DB_DATABASE', 'm2059127');
define('__DB_USER', 'm2059127');
define('__DB_PASS', 'VuzCzHaZ');

/*** create the database registry object ***/
$registry->db = DBModel::getInstance();

/*** Definde hjw88 as Superuser/ROOT ***/
define('__ROOT', 'hjw88');

/*** Define upload directory **/
define('__UPLOADS', __SITE_PATH.'/uploads/');
define('__MEDIALOCATION', 'uploads/');


