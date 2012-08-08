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
abstract class Config
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
        $this->_data = $config;
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
        // the value could be null, so not use isset()
        if (array_key_exists($name, $this->_data))
        {
            return $this->_data[$name];
        }

        throw new \DomainException("The configuration for '$name' does not exist!");
        return null;
    }

    /**
     * Magic method __isset 
     *
     * @param  string $name 
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->_data[$name]);
    }

    /**
     * Magic method __unset 
     *
     * @param  string $name 
     * @return void
     */
    public function __unset($name)
    {
        unset($this->_data[$name]);
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
        $this->_data = array_merge($this->_data, $config);
    }

    /**
     * Retrieve config
     *
     * @return array
     */
    public function retrieve()
    {
        return $this->_data;
    }
}

?>
