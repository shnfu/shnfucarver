<?php

/**
 * Error handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Error\Handler
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Error\Handler;

/**
 * Error handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Error\Handler
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * The singleton traits
     */
    use \ShnfuCarver\Common\Singleton\Singleton;

    /**
     * Error handler list 
     *
     * @var \ShnfuCarver\Core\Error\Handler\Callback
     */
    private $_errorHandlerList;

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
        if (!$this->_errorHandlerList instanceof \ShnfuCarver\Core\Error\Handler\Callback)
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
     * @return void
     */
    public function setCallbackList($callbackList)
    {
        $this->_errorHandlerList = $callbackList;
    }
}

?>
