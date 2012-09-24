<?php

/**
 * Class file for standard deparser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Deparser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Deparser;

/**
 * Class for standard deparser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Deparser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardDeparser implements DeparserInterface
{
    /**
     * Deparse a standard path info
     * Standard path info is deparsed to:
     * /good_forum.display_all_post-param1-param2-last_param
     *
     * @param  string $command
     * @return void
     */
    public function deparse(\ShnfuCarver\Component\Dispatcher\Router\Command\Command $command)
    {
        $controller = $command->getController();
        $action     = $command->getAction();
        $parameter  = $command->getAllParameter();

        $controllerString = $this->_formatControllerName($controller);
        $actionString     = $this->_formatActionName($action);
        $paramString      = $this->_buildParameter($parameter);

        if ($action)
        {
            $pathInfo = '/' . $controllerString . '.' . $actionString;
        }
        else
        {
            $pathInfo = '/' . $controllerString;
        }

        $pathInfo .= $paramString;

        return $pathInfo;
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
        return $this->_formatName($actionName);
    }

    /**
     * Build the parameter string
     *
     * @param  array  $parameter
     * @return string
     */
    private function _buildParameter(array $parameter)
    {
        if (!empty($parameter))
        {
            array_unshift($parameter, '');
        }
        return implode('-', $parameter);
    }

    /**
     * Format name
     *
     * @param  string $Name
     * @return string
     */
    private function _formatName($name)
    {
        $name = preg_replace('/([A-Z])/', '_$1', lcfirst($name));
        return strtolower($name);
    }
}

?>
