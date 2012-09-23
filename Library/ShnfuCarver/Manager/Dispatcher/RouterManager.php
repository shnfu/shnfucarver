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
     * Init
     *
     * @return void
     */
    public function init()
    {
        $this->_registerService(new \ShnfuCarver\Service\Dispatcher\CommandService);

        parent::init();
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $rewriter = new \ShnfuCarver\Component\Dispatcher\Router\Rewriter\StandardRewriter;
        $parser = new \ShnfuCarver\Component\Dispatcher\Router\Parser\StandardParser;
        $route = new \ShnfuCarver\Component\Dispatcher\Router\Router\Router($rewriter, $parser);
        $command = $route->route($this->_getService('request')->getPathInfo());

        $this->_getService('command')->setCommand($command);

        parent::run();
    }
}

?>
