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
    protected $_configLoader;

    /**
     * All configuration data stored here
     *
     * @var array
     */
    protected $_config = array();

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
        $configObject = $this->_configLoader->load($configPath);
        $this->_config = $configObject->retrieve();
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
