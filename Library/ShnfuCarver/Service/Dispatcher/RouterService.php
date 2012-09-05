<?php

/**
 * Class file for router service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Dispatcher;

/**
 * Router service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RequestService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * Router
     *
     * @var Router
     */
    protected $_router;

    /**
     * construct 
     *
     * @return void
     */
    public function __construct()
    {
        $this->_router = new ShnfuCarver\Component\Dispatcher\Router;
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
        if (!method_exists($this->_router, $method))
        {
            throw new \BadMethodCallException("Method '$method' for RequestService does not exist!");
        }

        $return = call_user_func_array(array($this->_router, $method), $param);
    }
}

?>
