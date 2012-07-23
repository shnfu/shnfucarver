<?php

/**
 * Header class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Component\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Response\Component\Header;

/**
 * Header class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Component\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Header
{
    /**
     * The header
     *
     * @var array
     */
    private $_header = array();

    /**
     * The header could appear more than once
     *
     * @var bool
     */
    private $_unique = false;

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
