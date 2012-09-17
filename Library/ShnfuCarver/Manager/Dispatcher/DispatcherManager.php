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
            new \ShnfuCarver\Manager\Dispatcher\RouterManager,
            new \ShnfuCarver\Manager\Dispatcher\ControllerManager,
            new \ShnfuCarver\Manager\Dispatcher\ResponseManager,
        );

        $this->addSubManager($subManager);
    }
}

?>
