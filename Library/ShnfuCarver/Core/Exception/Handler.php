<?php

/**
 * Exception handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Exception;

/**
 * Exception handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * Exception handler list 
     *
     * @var \ShnfuCarver\Core\Exception\Callback
     */
    private static $_exceptionHandlerList;

    /**
     * The main exception handler 
     *
     * If no error handler exists, return false and back to the normal one
     *
     * @param  int    $errNo 
     * @param  string $errStr 
     * @param  string $errFile 
     * @param  int    $errLine 
     * @param  array  $errContext 
     * @return bool
     */
    public static function handler($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        if (!self::$_errorHandlerList instanceof \ShnfuCarver\Core\Exception\Callback)
        {
            return false;
        }

        return self::$_errorHandlerList->callList
            (array($errNo, $errStr, $errFile, $errLine, $errContext));
    }

    /**
     * Substitue the system error handler
     *
     * @return bool
     */
    public static function setErrorHandler()
    {
        return set_error_handler(array(__CLASS__, 'handler'));
    }

    /**
     * Append a new error handler 
     *
     * @param  string|array $errorHandler 
     * @return \ShnfuCarver\Core\Exception\Callback
     */
    public static function setCallbackList($callbackList)
    {
        self::$_errorHandlerList = $callbackList;
        return self::$_errorHandlerList;
    }
}

?>
