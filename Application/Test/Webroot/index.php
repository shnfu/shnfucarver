<?php

define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../../../Library'));
define('CONFIGURATION_PATH', realpath(dirname(__FILE__) . '/../Config'));

require_once LIBRARY_PATH . '/ShnfuCarver/Core/Application.php';

$application = new \ShnfuCarver\Core\Application;
$application->run(CONFIGURATION_PATH . '/Core.php');

?>
