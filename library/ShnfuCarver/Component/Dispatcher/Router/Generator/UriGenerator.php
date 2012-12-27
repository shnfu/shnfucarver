<?php

/**
 * Class file for URI generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Class for URI generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class UriGenerator
{
    /**
     * The path info generator
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Generator\Generator
     */
    private $_generator;

    /**
     * The request
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Request
     */
    private $_request;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Request\Request                   $request
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Deparser\DeparserInterface $deparser
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface  $rewriter
     * @return void
     */
    public function __construct($request, $deparser, $rewriter = null)
    {
        $this->_request   = $request;
        $this->_generator = new Generator($deparser, $rewriter);
    }

    /**
     * Generate the URI
     *
     * @param  string $controller
     * @param  string $action
     * @param  array  $parameter
     * @return string
     */
    public function generateUri($controller = '', $action = '', array $parameter = array())
    {
        $scheme  = $this->_request->getScheme();
        $host    = $this->_request->getHttpHost();
        $baseUrl = $this->_request->getBaseUrl();

        $pathInfo = $this->_generator->generate
            (new \ShnfuCarver\Component\Dispatcher\Router\Command\Command($controller, $action, $parameter));

        return $scheme . '://' . $host . $baseUrl . $pathInfo;
    }
}

?>
