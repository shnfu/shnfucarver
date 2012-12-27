<?php

/**
 * View base class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\View\Template;

/**
 * View base class
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class View implements ViewInterface
{
    /**
     * Load the view file
     *
     * @param  string $viewPath
     * @param  array  $par
     * @return string
     */
    abstract public function load($viewPath, $par);
}

?>
