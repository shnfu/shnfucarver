<?php

/**
 * Exception manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Exception;

/**
 * Exception manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ExceptionManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * The exception handler
     *
     * @var \ShnfuCarver\Component\Debug\Exception\Handler
     */
    protected $_exceptionHandler;

    /**
     * The exception handler
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
        $this->_exceptionHandler = new \ShnfuCarver\Component\Debug\Exception\Handler;

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
            $this->_exceptionHandler->setHandler($this->_handler);
            $this->_exceptionHandler->register();
        }

        parent::run();
    }

    /**
     * Internal handler
     *
     * @return bool|\ShnfuCarver\Component\Debug\Exception\InternalHandler
     */
    protected function _internalHandler()
    {
        $useInternalHandler = isset($this->_config['use_internal_handler'])
            ? $this->_config['use_internal_handler'] : false;
        if (!$useInternalHandler)
        {
            return false;
        }

        $internalHandler = new \ShnfuCarver\Component\Debug\Exception\InternalHandler;
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
