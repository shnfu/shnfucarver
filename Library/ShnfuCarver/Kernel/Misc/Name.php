<?php

/**
 * Name class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Misc
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Misc;

/**
 * Name class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Misc
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Name
{
    /**
     * Get the name of a class
     *
     * @param  string $name
     * @param  string $suffix
     * @return string
     */
    public static function extractName($name, $suffix)
    {
        // Get rid of the namespace
        $pos = strrpos($name, '\\');
        if (false !== $pos)
        {
            $name = substr($name, $pos + 1);
        }
        // Strip the suffix
        $length = strlen($suffix);
        if (substr($name, -$length) == $suffix)
        {
            $name = substr($name, 0, -$length);
        }

        // Split the name according to the uppercase letter
        $name = preg_replace('/([A-Z])/', '_$1', lcfirst($name));
        $name = strtolower($name);

        return $name;
    }
}

?>
