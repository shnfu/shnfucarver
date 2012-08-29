<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Kernel/Application/Application.php';

class Application extends \ShnfuCarver\Kernel\Application\Application
{
    /**
     * ShnfuCarver framework autoloader
     *
     * @var \ShnfuCarver\Kernel\Autoloader\Autoloader
     */
    protected $_frameworkAutoloader;

    protected function _registerManager()
    {
        require_once APPLICATION_PATH . '/Application/Manager/TestManager.php';

        $manager = array
        (
            new \ShnfuCarver\Manager\Config\ConfigManager(CONFIGURATION_PATH . '/Config.php'),
            new \ShnfuCarver\Manager\Autoloader\AutoloaderManager,
            new \ShnfuCarver\Manager\Error\ErrorManager,
            new \ShnfuCarver\Manager\Exception\ExceptionManager,
            new TestManager,
        );
        return $manager;
    }

    // For test purpose
    public function initialize()
    {
        // first call this so the autoloader for the framework is available
        $this->_initializeFrameworkAutoloader();

        date_default_timezone_set('Asia/Shanghai');

        parent::initialize();
    }

    /**
     * Register framework autoloader
     *
     * @return void
     */
    private function _initializeFrameworkAutoloader()
    {
        if (isset($this->_frameworkAutoloader))
        {
            return;
        }

        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Autoloader/Autoloader.php';
        $this->_frameworkAutoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/LoaderInterface.php';
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/NameIterator.php';
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/InternalLoader.php';
        $loader = new \ShnfuCarver\Component\Loader\InternalLoader;
        $loader->add('', SHNFUCARVER_PATH);

        $this->_frameworkAutoloader->setLoader($loader);
        $this->_frameworkAutoloader->register();
    }
}

?>
