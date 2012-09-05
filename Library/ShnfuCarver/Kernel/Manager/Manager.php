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
     * Sub manager
     * Array of \ShnfuCarver\Kernel\Manager\Manager
     *
     * @var array
     */
    protected $_subManager = array();

    /**
     * Config
     *
     * @var array
     */
    protected $_config = array();

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
     * Add sub manager
     *
     * @param  array|\ShnfuCarver\Kernel\Manager\Manager $subManager
     * @return void
     */
    public function addSubManager($subManager)
    {
        if ($subManager instanceof \ShnfuCarver\Kernel\Manager\Manager)
        {
            $this->_subManager[] = $subManager;
        }
        else if (is_array($subManager))
        {
            foreach ($subManager as $oneSubManager)
            {
                $this->_subManager[] = $oneSubManager;
            }
        }
        else
        {
            throw new \InvalidArgumentException('subManager must be an array or instance of \ShnfuCarver\Kernel\Manager\Manager!');
        }
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->run();
        }
    }

    /**
     * Clean
     *
     * @return void
     */
    public function clean()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->clean();
        }
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
        foreach ($this->_subManager as $subManager)
        {
            $subManager->setServiceRegistry($serviceRegistry);
        }
    }

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->loadConfig();
        }
    }

    /**
     * Get config
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Get a service
     *
     * @param  string $name
     * @return \ShnfuCarver\Kernel\Service\ServiceInterface $service
     */
    protected function _getService($name)
    {
        if (!$this->_serviceRegistry instanceof \ShnfuCarver\Kernel\Service\ServiceRegistry)
        {
            throw new \RuntimeException('The service registry is not set properly!');
        }

        return $this->_serviceRegistry->get($name);
    }

    /**
     * Does a service exist
     *
     * @param  string $name
     * @return bool
     */
    protected function _existService($name)
    {
        if (!$this->_serviceRegistry instanceof \ShnfuCarver\Kernel\Service\ServiceRegistry)
        {
            throw new \RuntimeException('The service registry is not set properly!');
        }

        return $this->_serviceRegistry->exist($name);
    }

    /**
     * Register a service
     *
     * @param  \ShnfuCarver\Kernel\Service\Service $service
     * @return \ShnfuCarver\Kernel\Service\Service
     */
    protected function _registerService($service)
    {
        if (!$this->_serviceRegistry instanceof \ShnfuCarver\Kernel\Service\ServiceRegistry)
        {
            throw new \RuntimeException('The service registry is not set properly!');
        }

        return $this->_serviceRegistry->register($service);
    }
}

?>
