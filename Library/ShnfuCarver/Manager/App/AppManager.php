<?php

/**
 * Application manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\App
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\App;

/**
 * Application manager class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class AppManager extends \ShnfuCarver\Manager\Manager
{
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
        $this->createServiceRegistry();

        $this->loadConfig();

        parent::run();
    }

    /**
     * Create service registry
     *
     * @param  string $configPath
     * @return void
     */
    public function registerConfigService($configPath)
    {
        $this->createServiceRegistry();

        $configService = $this->_registerService(new \ShnfuCarver\Service\Config\ConfigService);

        $configService->load($configPath);
    }

    /**
     * Create service registry
     *
     * @return void
     */
    public function createServiceRegistry()
    {
        if (!isset($this->_serviceRegistry))
        {
            $this->setServiceRegistry(new \ShnfuCarver\Kernel\Service\ServiceRegistry);
        }
    }
}

?>
