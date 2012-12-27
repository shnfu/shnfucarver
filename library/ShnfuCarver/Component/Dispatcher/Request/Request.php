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

namespace ShnfuCarver\Component\Dispatcher\Request;

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
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_get;

    /**
     * The POST parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_post;

    /**
     * The COOKIE parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    private $_cookie;

    /**
     * The FILES parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\File
     */
    private $_file;

    /**
     * The SERVER parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\Server
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
            array $cookie = array(), array $file = array(), array $server = array())
    {
        $this->_get    = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($get   );
        $this->_post   = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($post  );
        $this->_cookie = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($cookie);
        $this->_file   = new \ShnfuCarver\Component\Dispatcher\Request\Unit\File     ($file  );
        $this->_server = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Server   ($server);
    }

    /**
     * Get the GET parameter
     *
     * @return \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    public function getGet()
    {
        return $this->_get;
    }

    /**
     * Get the POST parameter
     *
     * @return \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    public function getPost()
    {
        return $this->_post;
    }

    /**
     * Get the COOKIE parameter
     *
     * @return \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
     */
    public function getCookie()
    {
        return $this->_cookie;
    }

    /**
     * Get the FILES parameter
     *
     * @return \ShnfuCarver\Component\Dispatcher\Request\Unit\File
     */
    public function getFile()
    {
        return $this->_file;
    }

    /**
     * Get the SERVER parameter
     *
     * @return \ShnfuCarver\Component\Dispatcher\Request\Unit\Server
     */
    public function getServer()
    {
        return $this->_server;
    }

    /**
     * Call methods of request
     *
     * @param  string $method
     * @param  array  $param
     * @return mixed
     */
    public function __call($method, array $param)
    {
        if (!method_exists($this->_server, $method))
        {
            throw new \BadMethodCallException("Method '$method' for RequestService does not exist!");
        }

        return call_user_func_array(array($this->_server, $method), $param);
    }
}

?>
