<?php

/**
 * Error manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Error;

/**
 * Error manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ErrorManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * The error handler
     *
     * @var \ShnfuCarver\Component\Debug\Error\Handler
     */
    protected $_errorHandler;

    /**
     * The error handler
     *
     * @var array
     */
    protected $_handler = array();

    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        $this->_errorHandler = new \ShnfuCarver\Component\Debug\Error\Handler;

        $internalHandler = $this->_internalHandler();
        if (false !== $internalHandler)
        {
            $this->_handler[] = $internalHandler;
        }

        parent::init();
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        // not empty handler
        if ($this->_handler)
        {
            $this->_errorHandler->setHandler($this->_handler);
            $this->_errorHandler->register();
        }

        parent::run();
    }

    /**
     * Internal handler
     *
     * @return bool|\ShnfuCarver\Component\Debug\Error\InternalHandler
     */
    protected function _internalHandler()
    {
        $useInternalHandler = isset($this->_config['use_internal_handler'])
            ? $this->_config['use_internal_handler'] : false;
        if (!$useInternalHandler)
        {
            return false;
        }
        $internalHandler = new \ShnfuCarver\Component\Debug\Error\InternalHandler;
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
