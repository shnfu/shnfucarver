<?php

/**
 * Error handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Handler\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Handler\Error;

/**
 * Error handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Handler\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Error
{
    private $_instance;

    const ERROR_DESCRIPTION = array
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

    const USER_ERROR_NAME = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE, E_USER_DEPRECATED);

    public static function errorHandler($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        $dt = date("Y-m-d H:i:s (T)");

        $err_string = "<br />$errFile($errLine):  <b>[$errNo] ";
        $err_string .= isset( self::$msErrorName[$errNo] ) ? self::$msErrorName[$errNo] : 'Unknown Error';
        $err_string .= "</b>: $errStr.  [$dt]<br />\n";

        echo $err_string;

        return true;
    }

    public static function setErrorHandler()
    {
        //date_default_timezone_set('Asia/Shanghai');
        set_error_handler(array('ShnfuCarver\Core\Handler\Error', 'errorHandler'));
    }
}

?>
