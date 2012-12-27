<?php

/**
 * Interface file for error handler
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Debug\Error;

/**
 * Interface for error handler
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface HandlerInterface
{
    /**
     * The error handler
     *
     * @param  int    $errNo
     * @param  string $errStr
     * @param  string $errFile
     * @param  int    $errLine
     * @param  array  $errContext
     * @return bool
     */
    public function handle($errNo, $errStr, $errFile, $errLine, $errContext);
}

?>
