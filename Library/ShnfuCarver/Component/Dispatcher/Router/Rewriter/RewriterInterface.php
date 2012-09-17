<?php

/**
 * Interface file for rewriter
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rewriter
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Rewriter;

/**
 * Interface for rewriter
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rewriter
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface RewriterInterface
{
    /**
     * Rewrite the path info
     *
     * @param  string $pathInfo
     * @return string
     */
    public function rewrite($pathInfo);
}

?>
