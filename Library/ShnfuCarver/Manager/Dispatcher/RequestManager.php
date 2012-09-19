<?php

/**
 * Request manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Request manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RequestManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        $this->_registerService(new \ShnfuCarver\Service\Dispatcher\RequestService);

        parent::init();
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $this->_getService('request')->create($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);

        parent::run();
    }
}

?>
