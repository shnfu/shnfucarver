<?php

/**
 * Internal exception handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Debug\Exception;

/**
 * Internal exception handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class InternalHandler implements HandlerInterface
{
    /**
     * The handler to be set
     *
     * @param  \Exception $exception 
     * @return bool
     */
    public function handle(\Exception $exception)
    {
        echo '<br />Uncaught exception: ' . $exception->getMessage() . '<br />' . PHP_EOL;
        return true;
    }
}

?>
