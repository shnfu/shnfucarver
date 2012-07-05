<?php

/**
 * Error handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Debug\Error;

/**
 * Error handler class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * Error handler list 
     *
     * @var array  Array of \ShnfuCarver\Core\Debug\HandlerInterface
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
    public function handle($errNo, $errStr, $errFile, $errLine, $errContext)
    {
        $handleSuccessfully = false;
        foreach ($this->_errorHandlerList as $handler)
        {
            if ($handler->handle($errNo, $errStr, $errFile, $errLine, $errContext))
            {
                $handleSuccessfully = true;
            }
        }

        return $handleSuccessfully;
    }

    /**
     * Substitue the system error handler
     *
     * @return mixed
     */
    public function register()
    {
        return set_error_handler(array($this, 'handle'));
    }

    /**
     * Set the error handler
     *
     * @param  array|\ShnfuCarver\Core\Debug\Error\HandlerInterface $handler 
     * @return void
     */
    public function setHandler($handler)
    {
        if (is_array($handler))
        {
            $tempList = $handler;
        }
        else
        {
            $tempList = array($handler);
        }

        foreach ($tempList as $tempHandler)
        {
            if (!$tempHandler instanceof \ShnfuCarver\Core\Debug\Error\HandlerInterface)
            {
                throw new \InvalidArgumentException('The handler must be a \ShnfuCarver\Core\Debug\Error\HandlerInterface instance!');
            }
        }

        $this->_errorHandlerList = $tempList;
    }
}

?>
