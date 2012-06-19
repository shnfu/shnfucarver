<?php

/**
 * Application class file
 *
 * @package    ShnfuCarver
 * @subpackage Core
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core;

/**
 * Application class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Core
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Application
{
    /**
     * Configuration of application 
     * 
     * @var \ShnfuCarver\Core\Config\Base
     */
    private $_config;

    /**
     * Main process of the application 
     *
     * @param  string $configPath 
     * @return void
     */
    public function run($configPath)
    {
        $this->_loadConfig($configPath);
    }

    /**
     * Load configuration 
     * 
     * @param  string $configPath 
     * @return void
     */
    private function _loadConfig($configPath)
    {
        $this->_config = Config\Factory::useConfig($configPath);
    }

    private function _loadErrorHandler()
    {
        Handler\Error\Manager::setErrorHandler();
    }
}

?>
