<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

defined('SHNFUCARVER_PATH')
    || define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));

define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

class AppManager extends \ShnfuCarver\Manager\App\AppManager
{
    public function __construct()
    {
        parent::__construct();

        $subManager = array
        (
            new \ShnfuCarver\Manager\Autoloader\AutoloaderManager,
            new \ShnfuCarver\Manager\Error\ErrorManager,
            //new \ShnfuCarver\Manager\Exception\ExceptionManager,
            new \Test\TestManager,
            new \ShnfuCarver\Manager\View\ViewManager,
            new \ShnfuCarver\Manager\Dispatcher\DispatcherManager,
            new \Test\EndManager,
        );
        $this->addSubManager($subManager);
    }

    public function loadConfig()
    {
        $this->_get('config')->load(CONFIGURATION_PATH . '/Config.php');

        parent::loadConfig();
    }

    public function init()
    {
        date_default_timezone_set('Asia/Shanghai');

        parent::init();
    }
}

?>
