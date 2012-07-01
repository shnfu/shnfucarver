<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Config'));

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Application.php';

class Application extends \ShnfuCarver\Application
{
}

?>
