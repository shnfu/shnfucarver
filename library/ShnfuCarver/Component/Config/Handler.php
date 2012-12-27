<?php

/**
 * Handler class file for config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Config;

/**
 * Handler class for config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * The config loader
     *
     * @var \ShnfuCarver\Component\Config\Loader
     */
    private $_configLoader;

    /**
     * All configuration data stored here
     *
     * @var array
     */
    private $_config = array();

    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->_configLoader = new \ShnfuCarver\Component\Config\Loader;
    }

    /**
     * Load a specified config
     *
     * @param  string $configPath
     * @return void
     */
    public function load($configPath)
    {
        $this->_config = $this->_configLoader->load($configPath);
    }

    /**
     * Load and append the config to the original one
     *
     * @param  string $configPath
     * @return void
     */
    public function loadAppend($configPath)
    {
        $newConfig = $this->_configLoader->load($configPath);
        $this->_config = array_merge_recursive($this->_config, $newConfig);
    }

    /**
     * Retrieve config
     *
     * @return array
     */
    public function get($name)
    {
        if (!isset($this->_config[$name]))
        {
            return array();
        }

        return $this->_config[$name];
    }
}

?>
