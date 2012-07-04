<?php

/**
 * Exception handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception\Handler
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Exception\Handler;

/**
 * Exception handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Exception\Handler
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
     * Exception handler list 
     *
     * @var \ShnfuCarver\Core\Exception\Handler\Callback
     */
    private $_exceptionHandlerList;

    /**
     * The main exception handler 
     *
     * If no exception handler exists, return false
     *
     * @param  \Exception $exception 
     * @return bool
     */
    public function handle(\Exception $exception)
    {
        if (!$this->_exceptionHandlerList instanceof \ShnfuCarver\Core\Exception\Handler\Callback)
        {
            return false;
        }

        return $this->_exceptionHandlerList->callList(array($exception), true);
    }

    /**
     * Substitue the system exception handler
     *
     * @return mixed
     */
    public function register()
    {
        return set_exception_handler(array($this, 'handle'));
    }

    /**
     * Append a new exception handler 
     *
     * @param  string|array $callbackList 
     * @return void
     */
    public function setCallbackList($callbackList)
    {
        $this->_exceptionHandlerList = $callbackList;
    }
}

?>
