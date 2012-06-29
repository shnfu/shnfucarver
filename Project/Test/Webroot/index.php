<?php

define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

require_once APPLICATION_PATH . '/Application/TestApplication.php';

$application = new TestApplication();
$application->run();

?>
