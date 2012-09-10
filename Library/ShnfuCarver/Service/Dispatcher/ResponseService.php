<?php

/**
 * Class file for response service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Dispatcher;

/**
 * Response service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ResponseService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * Response
     *
     * @var Response
     */
    protected $_response;

    /**
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Set result
     *
     * @param  string|\ShnfuCarver\Component\Dispatcher\Response\Response $response
     * @return mixed
     */
    public function setResponse($response)
    {
        if ($response instanceof \ShnfuCarver\Component\Dispatcher\Response\Response)
        {
            $this->_response = $response;
        }
        else if (is_string($response))
        {
            $this->_response = new \ShnfuCarver\Component\Dispatcher\Response\Response($response);
        }
        else
        {
            throw new \InvalidArgumentException('The response must be a string or an instance of \ShnfuCarver\Component\Dispatcher\Response\Response');
        }
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
        if (!method_exists($this->_response, $method))
        {
            throw new \BadMethodCallException("Method '$method' for ResponseService does not exist!");
        }

        return call_user_func_array(array($this->_response, $method), $param);
    }
}

?>
