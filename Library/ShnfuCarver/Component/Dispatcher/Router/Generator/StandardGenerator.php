<?php

/**
 * Class file for standard generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Class for standard generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardGenerator extends Generator
{
    /**
     * The request
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Request
     */
    private $_request;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Request\Request    $request
     * @return void
     */
    public function __construct($request)
    {
        $this->_request = $request;
    }

    /**
     * Generate the URI
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command $command
     * @return string
     */
    public function generate($command)
    {
        $controller = $command->getController();
        $action = $command->getAction();
        $parameterString = implode('-', $command->getAllParameter());

        if ($action)
        {
            $pathInfo = '/' . $controller . '.' . $action;
        }
        else
        {
            $pathInfo = '/' . $controllern;
        }

        if ($parameterString)
        {
            $pathInfo .= $parameterString;
        }

        $uri = $this->_request->getBaseUrl() . $pathInfo;

        $uri = $this->_request->getScheme() . '://' . $uri;

        return $uri;
    }
}

?>
