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
    private $_cookies;

    /**
     * The FILES parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\File
     */
    private $_files;

    /**
     * The SERVER parameter
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter
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
        $this->_get     = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($get    );
        $this->_post    = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($post   );
        $this->_cookies = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Parameter($cookies);
        $this->_files   = new \ShnfuCarver\Component\Dispatcher\Request\Unit\File     ($files  );
        $this->_server  = new \ShnfuCarver\Component\Dispatcher\Request\Unit\Server   ($server );
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
