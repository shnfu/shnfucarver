<?php

/**
 * Response class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Response\Unit

/**
 * Response class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Response
{
    /**
     * The header
     *
     * @var array
     */
    private $_header = array();

    /**
     * The header content
     *
     * @var string
     */
    private $_content = '';

    /**
     * The header could appear only once
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
        $this->_header[$name] = $value;
    }
}

?>
