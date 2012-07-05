<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Core/Application/Application.php';

class Application extends \ShnfuCarver\Core\Application\Application
{
    protected function _registerConfiguration()
    {
        $configObject = \ShnfuCarver\Core\Config\Factory::useConfig(CONFIGURATION_PATH . '/Config.php');
        return $configObject->retrieve();
    }

    protected function _registerManager()
    {
        $manager = array
        (
            new \ShnfuCarver\Core\Manager\Autoloader\AutoloaderManager,
            new \ShnfuCarver\Core\Manager\Error\ErrorManager,
            new \ShnfuCarver\Core\Manager\Exception\ExceptionManager,
        );
        return $manager;
    }

    // For test purpose
    public function run()
    {
        date_default_timezone_set('Asia/Shanghai');

        parent::run();

        echo $this->_config['test'] . PHP_EOL;
        echo $this->_config[''] . PHP_EOL;
        throw new \InvalidArgumentException('lfjklsjdslfj');
    }
}

?>
