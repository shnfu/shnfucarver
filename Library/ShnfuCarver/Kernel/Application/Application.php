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
     * The service registry
     *
     * @var \ShnfuCarver\Core\Service\Service
     */
    protected $_serviceRegistry;

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
}

?>
