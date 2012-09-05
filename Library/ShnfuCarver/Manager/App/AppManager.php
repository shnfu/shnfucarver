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
        $this->setServiceRegistry(new \ShnfuCarver\Kernel\Service\ServiceRegistry);

        $this->_loadAllConfig();

        $this->loadConfig();

        parent::run();
    }

    /**
     * Set the config path
     *
     * @param  string $configPath
     * @return void
     */
    public function setConfigPath($configPath)
    {
        $this->_configPath = $configPath;
    }

    /**
     * Set the config path
     *
     * @param  string $configPath
     * @return void
     */
    private function _loadAllConfig()
    {
        $configService = $this->_registerService(new \ShnfuCarver\Service\Config\ConfigService);
        $configService->load($this->_configPath);
    }
}

?>
