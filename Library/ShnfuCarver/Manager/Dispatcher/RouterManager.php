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
        $deparser = new \ShnfuCarver\Component\Dispatcher\Router\Deparser\StandardDeparser;
        $generator = new \ShnfuCarver\Component\Dispatcher\Router\Generator\UriGenerator($this->_get('request'), $deparser);
        $this->_registerService(new \ShnfuCarver\Kernel\Service\Service($generator, 'generator'));

        $parser = new \ShnfuCarver\Component\Dispatcher\Router\Parser\StandardParser;
        //$rewriter = new \ShnfuCarver\Component\Dispatcher\Router\Rewriter\PregRewriter;
        //$route = new \ShnfuCarver\Component\Dispatcher\Router\Router\Router($parser, $rewriter);
        $route = new \ShnfuCarver\Component\Dispatcher\Router\Router\Router($parser);
        $command = $route->route($this->_get('request')->getPathInfo());

        $this->_registerService(new \ShnfuCarver\Kernel\Service\Service($command));

        parent::run();
    }
}

?>
