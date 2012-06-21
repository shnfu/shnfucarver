<?php

define('LIBRARY_PATH', realpath(__DIR__ . '/../../../Library'));
define('CONFIGURATION_PATH', realpath(__DIR__ . '/../Config'));

require_once LIBRARY_PATH . '/ShnfuCarver/Application.php';

$application = \ShnfuCarver\Application::getInstance();
$application->run(CONFIGURATION_PATH . '/Core.php');

?>
