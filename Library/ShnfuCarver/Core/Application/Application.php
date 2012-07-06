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
     * Main process of the application 
     *
     * @param  string $configPath 
     * @return void
     */
    public function run()
    {
        $this->initialize();
    }

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        // first call this so the autoloader is available
        $this->_initializeFrameworkAutoloader();

        $this->_config = $this->_registerConfiguration();

        $internalManager = $this->_registerInternalManager();
        $extraManager = $this->_registerManager();
        $this->_manager = array_merge($internalManager, $extraManager);

        foreach ($this->_manager as $manager)
        {
            $managerName = $manager->getName();
            if (isset($this->_config[$managerName]))
            {
                $manager->setConfig($this->_config[$managerName]);
            }
            $manager->initialize();
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

    /**
     * Register internal managers
     *
     * @return array
     */
    private function _registerInternalManager()
    {
        $manager = array
        (
            new \ShnfuCarver\Core\Manager\Autoloader\AutoloaderManager,
            new \ShnfuCarver\Core\Manager\Error\ErrorManager,
            new \ShnfuCarver\Core\Manager\Exception\ExceptionManager,
        );
        return $manager;
    }
}

?>
