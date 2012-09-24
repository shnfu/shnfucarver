<?php

/**
 * Class file for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Class for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Generator
{
    /**
     * The path info deparser
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Parser\DeparserInterface
     */
    private $_deparser;

    /**
     * The path info rewriter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface
     */
    private $_rewriter;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Deparser\DeparserInterface $deparser
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface  $rewriter
     * @return void
     */
    public function __construct($deparser, $rewriter = null)
    {
        $this->_deparser = $deparser;
        $this->_rewriter = $rewriter;
    }

    /**
     * Generate the URI
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command $command
     * @return string
     */
    public function generate($command)
    {
        $pathInfo = $this->_deparser->deparse($command);

        if (!empty($this->_rewriter))
        {
            $pathInfo = $this->_rewriter->rewrite($pathInfo);
        }

        return $pathInfo;
    }
}

?>
