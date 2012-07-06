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
        $dt = date("Y-m-d H:i:s (T)");

        $err_string = '<br />Exception: ' . $exception->getFile();
        $err_string .= '(' . $exception->getLine() . '):  ';
        $err_string .= $exception->getMessage();
        $err_string .= ".  [$dt]<br />\n";

        echo $err_string;
        return true;
    }
}

?>
