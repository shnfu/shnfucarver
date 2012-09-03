<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Manager/App/AppManager.php';

class AppManager extends \ShnfuCarver\Manager\App\AppManager
{
    public function __construct()
    {
        // first call this so the autoloader for the framework is available
        $this->_initializeFrameworkAutoloader();

        require_once APPLICATION_PATH . '/Application/Manager/TestManager.php';
        $manager = array
        (
            new \ShnfuCarver\Manager\Autoloader\AutoloaderManager,
            new \ShnfuCarver\Manager\Error\ErrorManager,
            new \ShnfuCarver\Manager\Exception\ExceptionManager,
            new TestManager,
        );
        $this->addSubManager($manager);

        parent::__construct();
    }

    // For test purpose
    public function run()
    {
        date_default_timezone_set('Asia/Shanghai');

        $this->registerConfigService(CONFIGURATION_PATH . '/Config.php');

        parent::run();
    }

    /**
     * Register framework autoloader
     *
     * @return void
     */
    private function _initializeFrameworkAutoloader()
    {
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Autoloader/Autoloader.php';
        $frameworkAutoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/LoaderInterface.php';
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/NameIterator.php';
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/InternalLoader.php';
        $loader = new \ShnfuCarver\Component\Loader\InternalLoader;
        $loader->add('', SHNFUCARVER_PATH);

        $frameworkAutoloader->setLoader($loader);
        $frameworkAutoloader->register();
    }
}

?>
