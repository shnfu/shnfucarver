<?php

/**
 * Factory class file for config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Config;

/**
 * Factory class for config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Loader
{
    /**
     * Map of config type
     *
     * @var array
     */
    private $_configMap = array();

    /**
     * Namespace of config type
     *
     * @var array
     */
    private $_configNamespace = array();

    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        // add the "Format" namespace
        $this->addNamespace(__NAMESPACE__ . '\Format');
    }

    /**
     * Add config type to the config map
     *
     * @param  string $configType
     * @param  string $className
     * @return void
     */
    public function addConfigType($configType, $className)
    {
        $configType = strtolower($configType);
        $this->_configMap[$configType] = $className;
    }

    /**
     * Add namespace for config
     *
     * @param  string $namespace
     * @return void
     */
    public function addNamespace($namespace)
    {
        $this->_configNamespace[] = $namespace;
    }

    /**
     * Choose which config type to load
     *
     * @param  string $configPath
     * @return \ShnfuCarver\Component\Config\Format\Config
     */
    public function load($configPath)
    {
        $configType = pathinfo($configPath, PATHINFO_EXTENSION);

        $configType = strtolower($configType);

        if (isset($this->_configMap[$configType]))
        {
            $configClass = $this->_configMap[$configType];
        }
        else
        {
            foreach ($this->_configNamespace as $configNamespace)
            {
                $configClass = rtrim($configNamespace, '\\') . '\\' . ucfirst($configType);
            }
        }

        // try to find the class
        if (!class_exists($configClass))
        {
            throw new \InvalidArgumentException("'$configClass' class does not exist!");
        }

        // try to load the class
        $config = new $configClass($configPath);
        if (!$config instanceof Format\Config)
        {
            throw new \InvalidArgumentException("'$configClass' is not an instance of '\ShnfuCarver\Component\Config\Format\Config' !");
        }

        return $config;
    }
}

?>
