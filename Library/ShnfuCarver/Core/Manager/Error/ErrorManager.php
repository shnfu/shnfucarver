<?php

/**
 * Error manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager\Error;

/**
 * Error manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ErrorManager extends \ShnfuCarver\Core\Manager\Manager
{
    /**
     * The error handler
     *
     * @var \ShnfuCarver\Core\Debug\Error\Handler
     */
    protected $_errorHandler;

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        $this->_errorHandler = new \ShnfuCarver\Core\Debug\Error\Handler;

        $handler = array();

        $internalHandler = $this->_internalHandler();
        if (false !== $internalHandler)
        {
            $handler[] = $internalHandler;
        }

        // not empty handler
        if ($handler)
        {
            $this->_errorHandler->setHandler($handler);
            $this->_errorHandler->register();
        }
    }

    /**
     * Internal handler
     *
     * @return bool|\ShnfuCarver\Core\Debug\Error\InternalHandler
     */
    protected function _internalHandler()
    {
        $useInternalHandler = isset($this->_config['use_internal_handler'])
            ? $this->_config['use_internal_handler'] : false;
        if (!$useInternalHandler)
        {
            return false;
        }

        $internalHandler = new \ShnfuCarver\Core\Debug\Error\InternalHandler;
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
