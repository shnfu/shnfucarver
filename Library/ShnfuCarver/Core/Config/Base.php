<?php

/**
 * Base class file for any config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Config;

/**
 * Base class for any config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Base
{
    /**
     * All configuration data stored here
     *
     * @var array
     */
    protected $_data = array();

    /**
     * construct 
     *
     * @param  array $config 
     * @return void
     */
    public function __construct(array $config)
    {
        $this->import($config);
        $this->_data = config;
    }

    /**
     * Magic method __set 
     *
     * @param  string $name 
     * @param  mixed  $value 
     * @return void
     */
    public function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    /**
     * Magic method __get 
     *
     * @param  string $name 
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->_data))
        {
            return $this->_data[$name];
        }
        return null;
    }

    /**
     * Import config
     *
     * Old config preserved
     * Existed config will be overwritten
     *
     * @param  array $config 
     * @return void
     */
    public function import(array $config)
    {
        foreach($config as $key => $value)
        {
            $this->_data[$key] = $value;
        }
    }
}

?>
