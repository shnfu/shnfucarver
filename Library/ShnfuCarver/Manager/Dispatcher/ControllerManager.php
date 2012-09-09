<?php

/**
 * Controller manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Controller manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ControllerManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $commandService = $this->_getService('command');

        echo 'Path: ' . $commandService->getPath() . PHP_EOL;
        echo 'Path: ' . $commandService->getAction() . PHP_EOL;
        echo 'Path: ' . $commandService->getParameter() . PHP_EOL;

        parent::run();
    }
}

?>
