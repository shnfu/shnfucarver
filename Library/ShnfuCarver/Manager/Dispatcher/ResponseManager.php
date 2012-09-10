<?php

/**
 * Response manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Response manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ResponseManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $responseService = $this->_getService('response');

        $responseService->send();

        parent::run();
    }
}

?>
