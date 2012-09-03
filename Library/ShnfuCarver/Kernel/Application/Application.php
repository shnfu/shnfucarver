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
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Main process of the application 
     *
     * @return void
     */
    public function run()
    {
        $this->run();
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $this->_serviceRegistry = new \ShnfuCarver\Kernel\Service\ServiceRegistry;

        // load all managers
        $this->_manager = $this->_registerManager();

        foreach ($this->_manager as $manager)
        {
            self::_validateManager($manager);

            $manager->setServiceRegistry($this->_serviceRegistry);

            // do the run
            $manager->loadConfig();
            $manager->run();
        }
    }

    /**
     * Clean, this is often only needed for the debug purpose
     *
     * @return void
     */
    public function clean()
    {
        foreach ($this->_manager as $manager)
        {
            self::_validateManager($manager);

            // do the clean
            $manager->clean();
        }
    }

    /**
     * Check whether this is a valid manager
     *
     * @param  mixed $manager 
     * @return void
     */
    private static function _validateManager($manager)
    {
        if (!$manager instanceof \ShnfuCarver\Kernel\Manager\ManagerInterface)
        {
            throw new \RuntimeException('Not an instance of \ShnfuCarver\Kernel\Manager\ManagerInterface!');
        }
    }
}

?>
