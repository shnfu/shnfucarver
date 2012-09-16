<?php

/**
 * Class file for config service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Config;

/**
 * Config service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ConfigService extends \ShnfuCarver\Kernel\Service\Service
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
     * Add a config
     *
     * @param  array $config
     * @return void
     */
    public function add($config)
    {
        $this->_config = array_merge_recursive($this->_config, $config);
    }

    /**
     * Retrieve config
     *
     * @return array|null
     */
    public function get($name)
    {
        if (!isset($this->_config[$name]))
        {
            return null;
        }

        return $this->_config[$name];
    }
}

?>
