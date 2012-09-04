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
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Register a service
     *
     * @param  \ShnfuCarver\Kernel\Service\Service $service
     * @return \ShnfuCarver\Kernel\Service\Service
     */
    public function register($service)
    {
        if (!$service instanceof ServiceInterface)
        {
            throw new \InvalidArgumentException("Not an instance of ServiceInterface!");
        }

        $name = $service->getName();

        if (!$this->exist($name))
        {
            $this->_service[$name] = $service;
        }

        return = $this->get($name);
    }

    /**
     * Check whether a service exists
     *
     * @param  string $name
     * @return bool
     */
    public function exist($name)
    {
        return isset($this->_service[$name]);
    }

    /**
     * Get a service
     *
     * @param  string $name
     * @return object
     */
    public function get($name)
    {
        if (!isset($this->_service[$name]))
        {
            throw new \InvalidArgumentException("The service $name does not exist!");
        }

        return $this->_service[$name];
    }
}

?>
