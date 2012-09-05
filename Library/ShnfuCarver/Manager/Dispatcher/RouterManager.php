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
class RequestManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * The autoloader
     *
     * @var \ShnfuCarver\Component\Router\Router
     */
    protected $_request;

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $request = $this->_registerService(new \ShnfuCarver\Service\Dispatcher\Router);

        $request->create($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);

        parent::run();
    }
}

?>
