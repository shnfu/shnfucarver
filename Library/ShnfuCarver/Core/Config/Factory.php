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
     * @return \ShnfuCarver\Core\Config\Base
     */
    public static function useConfig($configPath)
    {
        $configType = pathinfo($configPath, PATHINFO_EXTENSION);

        // Upper case for the first letter, lower for the left
        $configType = strtolower($configType);
        $configType = ucfirst($configType);

        if (class_exists($className))
        {
            return new $className($configPath);
        }
    }
}

?>
