<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Core/Application/Application.php';

class Application extends \ShnfuCarver\Core\Application\Application
{
    /**
     * ShnfuCarver framework autoloader
     *
     * @var \ShnfuCarver\Core\Autoloader\Autoloader
     */
    protected $_frameworkAutoloader;

    protected function _loadConfiguration()
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
    public function initialize()
    {
        // first call this so the autoloader for the framework is available
        $this->_initializeFrameworkAutoloader();

        date_default_timezone_set('Asia/Shanghai');

        parent::initialize();
    }


    // For test purpose
    public function run()
    {
        // Testing...
        setcookie("cookie[three]", "cookiethree");
        setcookie("cookie[two]", "cookietwo");
        setcookie("cookie[one]", "cookieone");

        $aaa = array();
        echo $aaa['fjls'];
        echo $this->_config['test'] . PHP_EOL;
        echo $this->_config[''] . PHP_EOL;
        throw new \InvalidArgumentException('lfjklsjdslfj');

        parent::run();
    }

    /**
     * Register framework autoloader
     *
     * @return void
     */
    private function _initializeFrameworkAutoloader()
    {
        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Core/Loader/InternalLoader.php';
        $loader = new \ShnfuCarver\Core\Loader\InternalLoader;
        $loader->add('', SHNFUCARVER_PATH);
        if (!isset($this->_frameworkAutoloader))
        {
            require_once SHNFUCARVER_PATH . '/ShnfuCarver/Core/Autoloader/Autoloader.php';
            $this->_frameworkAutoloader = new \ShnfuCarver\Core\Autoloader\Autoloader;
        }
        $this->_frameworkAutoloader->setLoader($loader);
        $this->_frameworkAutoloader->register();
    }
}

?>
