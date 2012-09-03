<?php

define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

require_once APPLICATION_PATH . '/Application/Application.php';

$application = new AppManager();
$application->run();

?>
