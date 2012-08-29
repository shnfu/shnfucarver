<?php

/**
 * Manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Manager;

/**
 * Manager class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Manager implements ManagerInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

    /**
     * Config
     *
     * @var array
     */
    protected $_config;

    /**
     * Service registry
     *
     * @var \ShnfuCarver\Kernel\Service\ServiceRegistry
     */
    protected $_serviceRegistry;

    /**
     * Get name from the class name
     *
     * @return string
     */
    public function getName()
    {
        if (isset($this->_name))
        {
            return $this->_name;
        }

        $name = get_class($this);
        // Get rid of the namespace
        $pos = strrpos($name, '\\');
        if (false !== $pos)
        {
            $name = substr($name, $pos + 1);
        }
        // Strip the Manager suffix
        $pos = strrpos($name, 'Manager');
        if (false !== $pos)
        {
            $name = substr($name, 0, $pos);
        }
        // Split the name according to the uppercase letter
        $nameFragment = preg_split('/(?=[A-Z])/', $name);
        $name = strtolower(implode('_', $nameFragment));
        $name = ltrim($name, '_');

        $this->_name = $name;

        return $this->_name;
    }

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute()
    {
    }

    /**
     * Finalization
     *
     * @return void
     */
    public function finalize()
    {
    }

    /**
     * Set service registry
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry
     * @return void
     */
    public function setServiceRegistry(\ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry)
    {
        $this->_serviceRegistry = $serviceRegistry;
    }

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
    }

    /**
     * Get a service
     *
     * @param  string $name
     * @return \ShnfuCarver\Kernel\Service\ServiceInterface $service
     */
    protected function _getService($name)
    {
        return $this->_serviceRegistry->get($name);
    }
}

?>
