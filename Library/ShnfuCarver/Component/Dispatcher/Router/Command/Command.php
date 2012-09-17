<?php

/**
 * Command class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Command
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Command;

/**
 * Command class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Command
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Command
{
    /**
     * The controller name
     *
     * @var string
     */
    private $_controller = '';

    /**
     * The action name
     *
     * @var string
     */
    private $_action = '';

    /**
     * The parameters
     *
     * @var array
     */
    private $_parameter = array();

    /**
     * construct
     *
     * @param  string $controller
     * @param  string $action
     * @param  array  $parameter
     * @return void
     */
    public function __construct($controller, $action, array $parameter)
    {
        $this->_controller = $controller;
        $this->_action     = $action;
        $this->_parameter  = $parameter;
    }

    /**
     * Get controller
     *
     * @return string
     */
    public function getController()
    {
        return $this->_controller;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * Get all parameters
     *
     * @return array
     */
    public function getAllParameter()
    {
        return $this->_parameter;
    }
}

?>
