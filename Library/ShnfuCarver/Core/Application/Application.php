<?php

/**
 * Application class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Application;

defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(__DIR__ . '/../../..'));

/**
 * Application class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Core\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Application
{
    /**
     * ShnfuCarver framework autoloader
     *
     * @var \ShnfuCarver\Core\Autoloader\Autoloader
     */
    protected $_frameworkAutoloader;

    /**
     * Configuration of application 
     *
     * @var array
     */
    protected $_config = array();

    /**
     * All managers
     *
     * @var array
     */
    protected $_manager = array();

    /**
     * Main process of the application 
     *
     * @param  string $configPath 
     * @return void
     */
    public function run()
    {
        $this->initialize();
        $this->execute();
    }

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        // first call this so the autoloader for the framework is available
        $this->_initializeFrameworkAutoloader();

        $this->_config = $this->_loadConfiguration();

        $this->_manager = $this->_registerManager();

        foreach ($this->_manager as $manager)
        {
            if (!$manager instanceof \ShnfuCarver\Core\Manager\ManagerInterface)
            {
                throw new \RuntimeException('Not an instance of \ShnfuCarver\Core\Manager\ManagerInterface!');
            }

            $configName = $manager->getConfigName();
            if (isset($this->_config[$configName]))
            {
                $manager->setConfig($this->_config[$configName]);
            }

            // do the initialization
            $manager->initialize();
        }
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute()
    {
        foreach ($this->_manager as $manager)
        {
            if (!$manager instanceof \ShnfuCarver\Core\Manager\ManagerInterface)
            {
                throw new \RuntimeException('Not an instance of \ShnfuCarver\Core\Manager\ManagerInterface!');
            }

            // do the execution
            $manager->execute();
        }
    }

    /**
     * Finalization, this is often only needed for the debug purpose
     *
     * @return void
     */
    public function finalize()
    {
        foreach ($this->_manager as $manager)
        {
            if (!$manager instanceof \ShnfuCarver\Core\Manager\ManagerInterface)
            {
                throw new \RuntimeException('Not an instance of \ShnfuCarver\Core\Manager\ManagerInterface!');
            }

            // do the finalization
            $manager->finalize();
        }
    }

    /**
     * Register framework autoloader
     *
     * @return void
     */
    private function _initializeFrameworkAutoloader()
    {
        require_once LIBRARY_PATH . '/ShnfuCarver/Core/Loader/InternalLoader.php';
        $loader = new \ShnfuCarver\Core\Loader\InternalLoader;
        $loader->add('', LIBRARY_PATH);
        if (!isset($this->_frameworkAutoloader))
        {
            require_once LIBRARY_PATH . '/ShnfuCarver/Core/Autoloader/Autoloader.php';
            $this->_frameworkAutoloader = new \ShnfuCarver\Core\Autoloader\Autoloader;
        }
        $this->_frameworkAutoloader->setLoader($loader);
        $this->_frameworkAutoloader->register();
    }
}

?>
