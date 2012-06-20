<?php

define('LIBRARY_PATH', realpath(__DIR__ . '/../../../Library'));
define('CONFIGURATION_PATH', realpath(__DIR__ . '/../Config'));

require_once LIBRARY_PATH . '/ShnfuCarver/Core/Application.php';

$application = new \ShnfuCarver\Core\Application;
$application->run(CONFIGURATION_PATH . '/Core.php');

?>
