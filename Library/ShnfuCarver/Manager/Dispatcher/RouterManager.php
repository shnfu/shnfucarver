<?php

/**
 * Router manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Router manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RouterManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $requestService = $this->_getService('request');

        $routeService = $this->_registerService(new \ShnfuCarver\Service\Dispatcher\RouterService);
        $command = $routeService->route($requestService->getPathInfo());

        $commandService = $this->_registerService(new \ShnfuCarver\Service\Dispatcher\CommandService);
        $commandService->setCommand($command);

        parent::run();
    }
}

?>
