<?php

/**
 * Exception manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager\Exception;

/**
 * Exception manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ExceptionManager extends \ShnfuCarver\Core\Manager\Manager
{
    /**
     * The exception handler
     *
     * @var \ShnfuCarver\Core\Debug\Exception\Handler
     */
    protected $_exceptionHandler;

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        $this->_exceptionHandler = new \ShnfuCarver\Core\Debug\Exception\Handler;

        $handler = array();

        $internalHandler = $this->_internalHandler();
        if (false !== $internalHandler)
        {
            $handler[] = $internalHandler;
        }

        // not empty handler
        if ($handler)
        {
            $this->_exceptionHandler->setHandler($handler);
            $this->_exceptionHandler->register();
        }
    }

    /**
     * Internal handler
     *
     * @return bool|\ShnfuCarver\Core\Debug\Exception\InternalHandler
     */
    protected function _internalHandler()
    {
        $useInternalHandler = isset($this->_config['use_internal_handler'])
            ? $this->_config['use_internal_handler'] : false;
        if (!$useInternalHandler)
        {
            return false;
        }

        $internalHandler = new \ShnfuCarver\Core\Debug\Exception\InternalHandler;
        //if (is_array($this->_config['internal_handler']))
        //{
        //    foreach ($this->_config['internal_handler'] as $)
        //    {
        //        $internalHandler->add($key, $value);
        //    }
        //}

        return $internalHandler;
    }
}

?>
