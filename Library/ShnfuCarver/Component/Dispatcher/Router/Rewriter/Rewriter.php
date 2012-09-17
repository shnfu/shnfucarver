<?php

/**
 * Class file for rewriter
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rewriter
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Rewriter;

/**
 * Class for rewriter
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rewriter
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Rewriter implements RewriterInterface
{
    /**
     * The pattern
     *
     * @var array
     */
    private $_pattern = array();

    /**
     * The replace
     *
     * @var array
     */
    private $_replace = array();

    /**
     * Construct
     *
     * @param  string|array $pattern
     * @param  string|array $replace
     * @return void
     */
    public function __construct($pattern = array(), $replace = array())
    {
        $this->addReplace($pattern, $replace);
    }

    /**
     * Rewrite the path info
     *
     * @param  string $pathInfo
     * @return string
     */
    public function rewrite($pathInfo)
    {
        return preg_replace($this->_pattern, $this->_replace, $pathInfo);
    }

    /**
     * Add replace
     *
     * @param  string|array $pattern
     * @param  string|array $replace
     * @return void
     */
    public function addReplace($pattern, $replace)
    {
        $this->_pattern = array_merge($this->_pattern, (array)$pattern);
        $this->_replace = array_merge($this->_replace, (array)$replace);
    }
}

?>
