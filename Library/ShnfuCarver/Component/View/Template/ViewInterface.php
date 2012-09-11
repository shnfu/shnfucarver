<?php

/**
 * View interface file
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\View\Template;

/**
 * View interface
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface ViewInterface
{
    /**
     * Load the view file
     *
     * @param  string $viewPath
     * @return string
     */
    public function load($viewPath);
}

?>
