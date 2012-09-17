<?php

/**
 * Router class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router;

/**
 * Router class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Router
{
    /**
     * The path info rewriter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface
     */
    private $_rewriter;

    /**
     * The path info parser
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Parser\ParserInterface
     */
    private $_parser;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface $rewriter
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Parser\ParserInterface    $parser
     * @return void
     */
    public function __construct($rewriter, $parser)
    {
        $this->_rewriter = $rewriter;
        $this->_parser   = $parser;
    }

    /**
     * Route a path info
     *
     * @param  string $pathInfo
     * @return \ShnfuCarver\Component\Dispatcher\Router\Command\Command
     */
    public function route($pathInfo)
    {
        $pathInfo = $this->_rewriter->rewrite($pathInfo);

        $this->_parser->parse($pathInfo);

        return new Command\Command($this->_parser->getControllerName(),
                $this->_parser->getActionName(), $this->_parser->getParameter());
    }
}

?>
