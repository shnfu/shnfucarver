<?php

/**
 * Dispatcher manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Dispatcher manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class DispatcherManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
        $subManager = array
        (
            new \ShnfuCarver\Manager\Dispatcher\RequestManager,
        );

        $this->addSubManager($subManager);
    }

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

        $this->_getService('Response')->send();
    }
}

?>
