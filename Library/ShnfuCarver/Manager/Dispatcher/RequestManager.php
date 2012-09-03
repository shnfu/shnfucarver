<?php

/**
 * Request manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Request;

/**
 * Request manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RequestManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * The autoloader
     *
     * @var \ShnfuCarver\Component\Request\Request
     */
    protected $_autoloader;

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $routeHandler->add(new route);
        $routeHandler->add(new route);
        $controller = find($request, $routeHandler);
        $response = call($controller);
        $response->send();
    }
}

?>
