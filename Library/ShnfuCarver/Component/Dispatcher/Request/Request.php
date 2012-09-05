<?php

/**
 * Request class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Request

/**
 * Request class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Request
{
    /**
     * The GET parameter
     *
     * @var ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_get;

    /**
     * The POST parameter
     *
     * @var ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_post;

    /**
     * The COOKIE parameter
     *
     * @var ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_cookies;

    /**
     * The FILES parameter
     *
     * @var ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_files;

    /**
     * The SERVER parameter
     *
     * @var ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_server;

    /**
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Create request from parameters
     *
     * @return void
     */
    public function create(array $get = array(), array $post = array(),
            array $cookies = array(), array $files = array(), array $server = array())
    {
        $this->_get     = $get;
        $this->_post    = $post;
        $this->_cookies = $cookies;
        $this->_files   = $files;
        $this->_server  = $server;
    }

    /**
     * Get path info
     *
     * @return string
     */
    public function getPathInfo()
    {
        return $this->_server->get['PATH_INFO'];
    }
}

?>
