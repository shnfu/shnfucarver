<?php

/**
 * Application class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Application;

/**
 * Application class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Application
{
    /**
     * The service registry
     *
     * @var \ShnfuCarver\Kernel\Service\ServiceRegistry
     */
    protected $_serviceRegistry;

    /**
     * All managers
     *
     * @var array
     */
    protected $_manager = array();

    /**
     * Main process of the application 
     *
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
        if (!isset($this->_serviceRegistry))
        {
            $this->_serviceRegistry = new \ShnfuCarver\Kernel\Service\ServiceRegistry;
        }

        $this->_manager = $this->_registerManager();

        foreach ($this->_manager as $manager)
        {
            self::$validateManager($manager);

            $manager->setServiceRegistry($this->_serviceRegistry);

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
            self::$validateManager($manager);

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
            self::$validateManager($manager);

            // do the finalization
            $manager->finalize();
        }
    }

    /**
     * Check whether this is a valid manager
     *
     * @param  mixed $manager 
     * @return void
     */
    public static function validateManager($manager)
    {
        if (!$manager instanceof \ShnfuCarver\Kernel\Manager\ManagerInterface)
        {
            throw new \RuntimeException('Not an instance of \ShnfuCarver\Kernel\Manager\ManagerInterface!');
        }
    }
}

?>
