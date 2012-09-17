<?php

/**
 * Class file for standard parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Parser;

/**
 * Class for standard parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardParser extends Parser
{
    /**
     * Parse a standard path info
     * The form of a standard URI is like:
     * http://www.example.com/index.php/good_forum.display_all_post-param1-param2-last_param
     * Standard path info is:
     * /good_forum.display_all_post-param1-param2-last_param
     *
     * @param  string $pathInfo
     * @return void
     */
    public function parse($pathInfo)
    {
        list($controllerActionString, $paramString) = $this->_seperateParameter(ltrim($pathInfo, '/'));
        list($controllerString, $actionString) = $this->_seperateControllerAction($controllerActionString);

        $this->_controllerName = $this->_formatControllerName($controllerString);
        $this->_actionName = $this->_formatActionName($actionString);
        $this->_parameter = explode('-', $paramString);
    }

    /**
     * Seperate the controller and action from parameters
     *
     * @param  string $pathInfo
     * @return array
     */
    private function _seperateParameter($pathInfo)
    {
        $paramPos = strpos($pathInfo, '-');
        if (false === $paramPos)
        {
            $controllerActionString = $pathInfo;
            $paramString = '';
        }
        else
        {
            $controllerActionString = substr($pathInfo, 0, $paramPos);
            $paramString = substr($pathInfo, $paramPos + 1);
        }

        return array($controllerActionString, $paramString);
    }

    /**
     * Seperate the controller from action
     *
     * @param  string $controllerActionString
     * @return array
     */
    private function _seperateControllerAction($controllerActionString)
    {
        $actionPos = strpos($controllerActionString, '.');
        if (false === $actionPos)
        {
            $controllerName = $controllerActionString;
            $actionName = '';
        }
        else
        {
            $controllerName = substr($controllerActionString, 0, $actionPos);
            $actionName = substr($controllerActionString, $actionPos + 1);
        }

        return array($controllerName, $actionName);
    }

    /**
     * Format the controller name
     *
     * @param  string $controllerName
     * @return string
     */
    private function _formatControllerName($controllerName)
    {
        return $this->_formatName($controllerName);
    }

    /**
     * Format the action name
     *
     * @param  string $actionName
     * @return string
     */
    private function _formatActionName($actionName)
    {
        return lcfirst($this->_formatName($actionName));
    }

    /**
     * Format name
     *
     * @param  string $Name
     * @return string
     */
    private function _formatName($name)
    {
        $segment = explode('_', strtolower($name));
        $segment = array_map('ucfirst', $segment);
        return implode($segment);
    }
}

?>
