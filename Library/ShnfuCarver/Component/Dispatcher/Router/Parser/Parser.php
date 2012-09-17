<?php

/**
 * Class file for parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Parser;

/**
 * Class for parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Parser implements ParserInterface
{
    /**
     * The controller name
     *
     * @var string
     */
    protected $_controllerName = '';

    /**
     * The action name
     *
     * @var string
     */
    protected $_actionName = '';

    /**
     * The parameters
     *
     * @var array
     */
    protected $_parameter = array();

    /**
     * Parse the path info
     *
     * @param  string $pathInfo
     * @return void
     */
    abstract public function parse($pathInfo);

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
