<?php

/**
 * Class file for rule
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rule
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Rule;

/**
 * Class for rule
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rule
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Rule
{
    /**
     * The pattern
     *
     * @var array
     */
    private $_pattern = array();

    /**
     * The replace
     *
     * @var array
     */
    private $_replace = array();

    /**
     * The generator
     *
     * @var string
     */
    private $_generator = '';

    /**
     * The parameter separator
     *
     * @var string
     */
    private $_parameterSeparator = '-';

    /**
     * Get the controller name
     *
     * @return string
     */
    public function getControllerName()
    {
        return $this->_controllerName;
    }

    /**
     * Get the action name
     *
     * @return string
     */
    public function getActionName()
    {
        return $this->_actionName;
    }

    /**
     * Get the parameters
     *
     * @return array
     */
    public function getParameter()
    {
        return $this->_parameter;
    }
}

?>
