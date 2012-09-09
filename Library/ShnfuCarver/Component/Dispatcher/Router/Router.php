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
        $urlSegment = array_filter(explode('/', $pathInfo));

        $path        = '\Default';
        $action      = 'index';
        $parameter   = array();

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

        return new \ShnfuCarver\Component\Dispatcher\Router\Command\Command($path, $action, $parameter);
    }
}

?>
