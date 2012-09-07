<?php

/**
 * Router class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router

/**
 * Router class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Router
{
    /**
     * The header
     *
     * @var array
     */
    private $_header = array();

    /**
     * construct 
     *
     * @param  array $header
     * @return void
     */
    public function __construct(array $header)
    {
        $this->_header = $header;
    }

    /**
     * Retrieve a value 
     *
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        if (!isset($this->_header[$name]))
        {
            return null;
        }
        return $this->_header[$name];
    }
}

?>
