<?php

/**
 * Static view class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\View\Template;

/**
 * Static view class
 *
 * @package    ShnfuCarver
 * @subpackage Component\View\Template
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Html extends View
{
    /**
     * Load the view file
     *
     * @param  string $viewPath
     * @return string
     */
    public function load($viewPath)
    {
        if (!file_exists($viewPath))
        {
            throw new \InvalidArgumentException('File "' . $viewPath . '" does not exist!');
        }

        return file_get_contents($viewPath);
    }
}

?>
