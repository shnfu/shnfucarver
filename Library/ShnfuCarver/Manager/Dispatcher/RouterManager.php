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
        $parser = new \ShnfuCarver\Component\Dispatcher\Router\Parser\StandardParser;
        //$rewriter = new \ShnfuCarver\Component\Dispatcher\Router\Rewriter\PregRewriter;
        //$route = new \ShnfuCarver\Component\Dispatcher\Router\Router\Router($parser, $rewriter);
        $route = new \ShnfuCarver\Component\Dispatcher\Router\Router\Router($parser);
        $command = $route->route($this->_getService('request')->getPathInfo());

        $this->_getService('command')->setCommand($command);

        parent::run();
    }
}

?>
