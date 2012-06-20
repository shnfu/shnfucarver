<?php

/**
 * Error handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Error;

/**
 * Error handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * Singleton instance
     *
     * @var \ShnfuCarver\Core\Error\Handler
     */
    private static $_instance;

    /**
     * Error handler list 
     *
     * @var \ShnfuCarver\Core\Error\Callback
     */
    private $_errorHandlerList;

    /**
     * Get the singleton instance 
     *
     * @return \ShnfuCarver\Core\Error\Handler
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Reset the singleton instance 
     *
     * @return void
     */
    public static function resetInstance()
    {
        unset(self::$_instance);
    }

    /**
     * The main error handler 
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
    public function handler($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        if (!$this->_errorHandlerList instanceof \ShnfuCarver\Core\Error\Callback)
        {
            return false;
        }

        return $this->_errorHandlerList->callList
            (array($errNo, $errStr, $errFile, $errLine, $errContext));
    }

    /**
     * Substitue the system error handler
     *
     * @return mixed
     */
    public function setErrorHandler()
    {
        return set_error_handler(array($this, 'handler'));
    }

    /**
     * Append a new error handler 
     *
     * @param  string|array $callbackList 
     * @return \ShnfuCarver\Core\Error\Handler
     */
    public function setCallbackList($callbackList)
    {
        $this->_errorHandlerList = $callbackList;
        return $this;
    }
}

?>
