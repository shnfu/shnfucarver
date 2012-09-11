<?php

/**
 * View loader class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\View;

/**
 * View loader class
 *
 * @package    ShnfuCarver
 * @subpackage Component\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Loader
{
    /**
     * Map of view type
     *
     * @var array
     */
    private $_viewMap = array();

    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        // add some internal type
        $this->addType('html', __NAMESPACE__ . '\Template\Html');
    }

    /**
     * Add view type to the view map
     *
     * @param  string $viewType
     * @param  string $className
     * @return \ShnfuCarver\Component\View\Loader
     */
    public function addType($viewType, $className)
    {
        $viewType = strtolower($viewType);
        $this->_viewMap[$viewType] = $className;

        return $this;
    }

    /**
     * Load a view
     *
     * @param  string $viewPath
     * @param  string $viewType
     * @return string
     */
    public function load($viewPath, $viewType)
    {
        $viewType = strtolower($viewType);
        if (isset($this->_viewMap[$viewType]))
        {
            $viewClass = $this->_viewMap[$viewType];
        }

        // try to find the class
        if (!class_exists($viewClass))
        {
            throw new \InvalidArgumentException("'$viewClass' class does not exist!");
        }

        // try to load the class
        $view = new $viewClass($viewPath);
        if (!$view instanceof Template\View)
        {
            throw new \InvalidArgumentException("'$viewClass' is not an instance of '\ShnfuCarver\Component\View\Template\View' !");
        }

        return $view->load($viewPath);
    }
}

?>
