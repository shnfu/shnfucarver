<?php

/**
 * Manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager;

/**
 * Manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Manager implements ManagerInterface
{
    /**
     * Config
     *
     * @var array
     */
    protected $_config;

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
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
     * Set config
     *
     * @param  array $config 
     * @return void
     */
    public function setConfig($config)
    {
        if (is_array($config))
        {
            $this->_config = $config;
        }
        else
        {
            throw new \InvalidArgumentException('Config should be an array');
        }
    }
}

?>
