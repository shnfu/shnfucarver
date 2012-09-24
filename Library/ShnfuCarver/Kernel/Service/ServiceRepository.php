<?php

/**
 * Service repository class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Service;

/**
 * Service repository class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ServiceRepository
{
    /**
     * Service repository
     *
     * @var array
     */
    protected $_repository = array();

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
            throw new \InvalidArgumentException('Not an instance of ServiceInterface!');
        }

        $name = $service->getName();

        if (!$this->exist($name))
        {
            $this->_repository[$name] = $service;
        }

        return $this->get($name);
    }

    /**
     * Check whether a service exists
     *
     * @param  string $name
     * @return bool
     */
    public function exist($name)
    {
        return isset($this->_repository[$name]);
    }

    /**
     * Get a service
     *
     * @param  string $name
     * @return object
     */
    public function get($name)
    {
        if (!isset($this->_repository[$name]))
        {
            throw new \InvalidArgumentException("The service $name does not exist!");
        }

        return $this->_repository[$name]->get();
    }
}

?>
