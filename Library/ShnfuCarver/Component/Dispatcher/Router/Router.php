<?php

/**
 * Router class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router;

/**
 * Router class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Router
{
    /**
     * construct 
     *
     * @param  array $header
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Route a path info
     *
     * @param  string $pathInfo
     * @return \ShnfuCarver\Component\Dispatcher\Router\Command\Command
     */
    public function route($pathInfo)
    {
        $pathInfo = $this->_rewriter->rewrite($pathInfo);

        list($path, $action, $parameter) = $this->_parser->parse($pathInfo);
        $path = $path ?: '\Default';
        $action = $action ?: 'index';

        return new \ShnfuCarver\Component\Dispatcher\Router\Command\Command($path, $action, $parameter);
    }

    /**
     * Rewrite a path info
     *
     * @param  string $pathInfo
     * @return string
     */
    public function rewrite($pathInfo)
    {
        return $pathInfo;
    }

    /**
     * Parse a standard path info
     * The form of a standard URI is like:
     * http://www.example.com/index.php/good_forum.display_all_post-param1-param2-last_param
     * Standard path info is:
     * /good_forum.display_all_post-param1-param2-last_param
     *
     * @param  string $pathInfo
     * @return array
     */
    public function parse($pathInfo)
    {
        $urlSegment = array_filter(explode('/', $pathInfo));
        $urlSegment = array_values($urlSegment);

        $path      = '\Default';
        $action    = 'index';
        $parameter = array();

        if (count($urlSegment) == 0)
        {
        }
        else if (count($urlSegment) == 1)
        {
            $path      = $urlSegment[0];
        }
        else
        {
            $path      = $urlSegment[0];
            $action    = $urlSegment[1];
            $parameter = array_slice($urlSegment, 2);
        }

        $path   = ucfirst(strtolower($path));
        $action = strtolower($action);

        return array($path, $action, $parameter);
    }
}

?>
