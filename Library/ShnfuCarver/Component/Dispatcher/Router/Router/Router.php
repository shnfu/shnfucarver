<?php

/**
 * Router class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Router;

/**
 * Router class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Router
{
    /**
     * The path info parser
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Parser\ParserInterface
     */
    private $_parser;

    /**
     * The path info rewriter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface
     */
    private $_rewriter;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Parser\ParserInterface    $parser
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface $rewriter
     * @return void
     */
    public function __construct($parser, $rewriter = null)
    {
        $this->_parser   = $parser;
        $this->_rewriter = $rewriter;
    }

    /**
     * Route a path info
     *
     * @param  string $pathInfo
     * @return \ShnfuCarver\Component\Dispatcher\Router\Command\Command
     */
    public function route($pathInfo)
    {
        if (!empty($this->_rewriter))
        {
            $pathInfo = $this->_rewriter->rewrite($pathInfo);
        }

        $command = $this->_parser->parse($pathInfo);

        return $command;
    }
}

?>
