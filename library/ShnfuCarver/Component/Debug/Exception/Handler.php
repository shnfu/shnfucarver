<?php

/**
 * Exception handler class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Debug\Exception;

/**
 * Exception handler class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Handler
{
    /**
     * Exception handler list
     *
     * @var \ShnfuCarver\Component\Exception\Handler\Callback
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
        $handleSuccessfully = false;
        foreach ($this->_exceptionHandlerList as $handler)
        {
            if ($handler->handle($exception))
            {
                $handleSuccessfully = true;
            }
        }

        return $handleSuccessfully;
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
     * Set the exception handler
     *
     * @param  array|\ShnfuCarver\Component\Debug\Exception\HandlerInterface $handler
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
            if (!$tempHandler instanceof \ShnfuCarver\Component\Debug\Exception\HandlerInterface)
            {
                throw new \InvalidArgumentException('The handler must be a \ShnfuCarver\Component\Debug\Exception\HandlerInterface instance!');
            }
        }

        $this->_exceptionHandlerList = $tempList;
    }
}

?>
