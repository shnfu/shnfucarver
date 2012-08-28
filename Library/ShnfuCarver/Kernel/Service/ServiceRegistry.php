<?php

/**
 * Service registry class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Service;

/**
 * Service registry class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ServiceRegistry
{
    /**
     * Service registry
     *
     * @var array
     */
    protected $_service = array();

    /**
     * Is case sensitive
     *
     * @var bool
     */
    protected $_caseSensitive = false;

    /**
     * construct 
     *
     * @param  bool $caseSensitive
     * @return void
     */
    public function __construct($caseSensitive = false)
    {
        $this->_caseSensitive = $caseSensitive;
    }

    /**
     * Format the name of service
     *
     * @param  string $name
     * @return string
     */
    public function formatName($name)
    {
        if (!$this->_caseSensitive)
        {
            $name = strtolower($name);
        }
        return $name;
    }

    /**
     * Register a service
     *
     * @param  string $name
     * @param  object $service
     * @return void
     */
    public function register($service)
    {
        if (!instanceof ServiceInterface)
        {
            throw new \InvalidArgumentException("Not an instance of ServiceInterface!");
        }

        $name = $this->formatName($service->getName());

        $this->_service[$name] = $service;
    }

    /**
     * Check whether a service exists
     *
     * @param  string $name
     * @return bool
     */
    public function exist($name)
    {
        $name = $this->formatName($name);

        return isset($this->_service[$name]);
    }

    /**
     * Load a service
     *
     * @param  string $name
     * @return object
     */
    public function load($name)
    {
        $name = $this->formatName($name);

        if (!isset($this->_service[$name]))
        {
            throw new \InvalidArgumentException("The service $name does not exist!");
        }

        return $this->_service[$name];
    }
}

?>
