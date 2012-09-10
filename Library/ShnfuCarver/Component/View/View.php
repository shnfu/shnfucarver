<?php

/**
 * View class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\View;

/**
 * View class
 *
 * @package    ShnfuCarver
 * @subpackage Component\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class View
{
    /**
     * Load a view
     *
     * @param  string $viewPath
     * @return \ShnfuCarver\Kernel\Service\ServiceInterface $service
     */
    protected function load($viewPath)
    {
        return $this->_serviceRegistry->get($name);
    }
}

?>
