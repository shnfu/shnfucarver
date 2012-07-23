<?php

/**
 * URI class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Request\Component
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Request\Component;

/**
 * URI class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Request\Component
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Uri
{
    /**
     * The URI
     *
     * @var string
     */
    private $_uri = '';

    /**
     * The path info
     *
     * @var string
     */
    private $_pathInfo = '';

    /**
     * construct
     *
     * @param  string $uri
     * @return void
     */
    public function __construct($uri)
    {
        $this->_uri = $uri;
    }

    /**
     * Get the URI
     *
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Get the path info
     *
     * @return string
     */
    public function getPathInfo()
    {
        return $this->_pathInfo;
    }
}

?>
