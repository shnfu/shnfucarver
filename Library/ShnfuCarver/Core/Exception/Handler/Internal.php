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
     * @param  \Exception $exception 
     * @return bool
     */
    public static function handle(\Exception $exception)
    {
        echo '<br />Uncaught exception: ' . $exception->getMessage() . '<br />' . PHP_EOL;
        return true;
    }
}

?>
