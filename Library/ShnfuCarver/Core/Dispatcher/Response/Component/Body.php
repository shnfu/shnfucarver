<?php

/**
 * Parameter class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Component
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Response\Component;

/**
 * Parameter class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Component
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Parameter
{
    /**
     * The parameter
     *
     * @var array
     */
    private $_parameter = array();

    /**
     * construct 
     *
     * @param  array $parameter
     * @return void
     */
    public function __construct(array $parameter)
    {
        $this->_parameter = $parameter;
    }

    /**
     * Retrieve a value 
     *
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        if (!isset($this->_parameter[$name]))
        {
            return null;
        }
        return $this->_parameter[$name];
    }

    /**
     * Set a value, append if not exist
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function set($name, $value)
    {
        $this->_parameter[$name] = $value;
    }
}

?>
