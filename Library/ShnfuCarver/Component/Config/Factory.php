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
class Factory
{
    /**
     * Choose which config type to use 
     *
     * @param string $configPath 
     * @return \ShnfuCarver\Component\Config\Config
     */
    public static function useConfig($configPath)
    {
        $configType = pathinfo($configPath, PATHINFO_EXTENSION);

        // Upper case for the first letter, lower for the left
        $configType = ucfirst(strtolower($configType));
        $configType = __NAMESPACE__ . '\\' . $configType;

        if (!class_exists($configType))
        {
            throw new \InvalidArgumentException("'$configType' class does not exist!");
        }

        $config = new $configType($configPath);
        if (!$config instanceof Config)
        {
            throw new \InvalidArgumentException("'$configType' is not an instance of '\ShnfuCarver\Component\Config\Config'!");
        }

        return $config;
    }
}

?>
