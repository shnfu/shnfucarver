<?php

/**
 * Controller class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Controller;

/**
 * Controller class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Controller implements ControllerInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

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
        // Strip the Controller suffix
        $pos = strrpos($name, 'Controller');
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
     * Set service registry
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRegistry|null $serviceRegistry
     * @return void
     */
    public function setServiceRegistry($serviceRegistry)
    {
        if (!$serviceRegistry instanceof \ShnfuCarver\Kernel\Service\ServiceRegistry)
        {
            $serviceRegistry = null;
        }

        $this->_serviceRegistry = $serviceRegistry;
        foreach ($this->_subManager as $subManager)
        {
            $subManager->setServiceRegistry($serviceRegistry);
        }
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
}

?>
