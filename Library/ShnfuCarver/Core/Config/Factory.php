<?php

/**
 * Factory class file for config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Config;

/**
 * Factory class for config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
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
     * @return \ShnfuCarver\Core\Config\Config
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
            throw new \InvalidArgumentException("'$configType' is not an instance of '\ShnfuCarver\Core\Config\Config'!");
        }

        return $config;
    }
}

?>
