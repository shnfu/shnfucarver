<?php

/**
 * Internal error handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Debug\Error;

/**
 * Internal error handler class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class InternalHandler implements HandlerInterface
{
    /**
     * Error code description
     *
     * @var array
     */
    private static $errorDescription = array
        (
            E_ERROR               => 'Error',
            E_WARNING             => 'Warning',
            E_PARSE               => 'Parsing Error',
            E_NOTICE              => 'Notice',
            E_CORE_ERROR          => 'Core Error',
            E_CORE_WARNING        => 'Core Warning',
            E_COMPILE_ERROR       => 'Compile Error',
            E_COMPILE_WARNING     => 'Compile Warning',
            E_USER_ERROR          => 'User Error',
            E_USER_WARNING        => 'User Warning',
            E_USER_NOTICE         => 'User Notice',
            E_STRICT              => 'Strict',
            E_RECOVERABLE_ERROR   => 'Recoverable Error',
            E_DEPRECATED          => 'Deprecated',
            E_USER_DEPRECATED     => 'User Deprecated',
        );

    /**
     * User error code
     *
     * @var array
     */
    private static $userErrorName = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE, E_USER_DEPRECATED);

    /**
     * The handler to be set
     *
     * @param  int    $errNo
     * @param  string $errStr
     * @param  string $errFile
     * @param  int    $errLine
     * @param  array  $errContext
     * @return bool
     */
    public function handle($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        $dt = date("Y-m-d H:i:s (T)");

        $err_string = "<br />Error: $errFile($errLine):  <b>[$errNo] ";
        $err_string .= isset(self::$errorDescription[$errNo]) ? self::$errorDescription[$errNo] : 'Unknown Error';
        $err_string .= "</b>: $errStr.  [$dt]<br />\n";

        echo $err_string;

        return true;
    }
}

?>
