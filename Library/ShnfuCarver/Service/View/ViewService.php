<?php

/**
 * Class file for view service
 *
 * @package    ShnfuCarver
 * @subpackage Service\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\View;

/**
 * View service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ViewService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * The view loader
     *
     * @var \ShnfuCarver\Component\View\Loader
     */
    private $_viewLoader;

    /**
     * The view search directory
     *
     * @var array
     */
    private $_viewDirectory = array();

    /**
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
        $this->_viewLoader = new \ShnfuCarver\Component\View\Loader;
    }

    /**
     * Load a specified view
     *
     * @param  string $viewName
     * @param  array  $parameter
     * @param  string $viewType
     * @return string
     */
    public function load($viewName, array $parameter = array(), $viewType = '')
    {
        foreach ($this->_viewDirectory as $viewDirectory)
        {
            $viewPath = rtrim($viewDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $viewName;
            if (file_exists($viewPath))
            {
                return $this->_viewLoader->load($viewPath, $parameter, $viewType);
            }
        }

        throw new \InvalidArgumentException('Could not find file "' . $viewName . '"!');
    }

    /**
     * Add a search directory
     *
     * @param  string|array $viewDirectory
     * @return \ShnfuCarver\Service\View\ViewService
     */
    public function addViewDirectory($viewDirectory)
    {
        $this->_viewDirectory = array_merge($this->_viewDirectory, (array)$viewDirectory);

        return $this;
    }
}

?>
