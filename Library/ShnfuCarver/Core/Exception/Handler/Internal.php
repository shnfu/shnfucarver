<?php

/**
 * Internal exception handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception\Handler
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Exception\Handler;

/**
 * Internal exception handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception\Handler
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Internal
{
    /**
     * The handler to be set
     *
     * @param  \ShnfuCarver\Core\Exception\Base $exception 
     * @return bool
     */
    public static function handler($exception)
    {
        echo '<br />Uncaught exception: ' . $exception->getMessage() . '<br />' . PHP_EOL;
        return true;
    }
}

?>
