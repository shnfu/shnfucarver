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
abstract class Rewriter implements RewriterInterface
{
    /**
     * Rewrite the path info
     *
     * @param  string $pathInfo
     * @return string
     */
    abstract public function rewrite($pathInfo);
}

?>
