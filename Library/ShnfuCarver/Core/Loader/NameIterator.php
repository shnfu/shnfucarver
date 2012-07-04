<?php

/**
 * Name iterator class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Loader;

/**
 * Name iterator class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class NameIterator implements Iterator
{
    /**
     * The name to be iterated
     *
     * @var string
     */
    private $_name = '';

    /**
     * The prefix for the current split
     *
     * @var string
     */
    private $_prefix = '';

    /**
     * The suffix for the current split
     *
     * @var string
     */
    private $_suffix = '';

    /**
     * The order when split the namespace
     * true means from right to left and false for left to right
     *
     * @var bool
     */
    private $_end = false;

    /**
     * The order when split the namespace
     * true means from right to left and false for left to right
     *
     * @var bool
     */
    private $_reverse = false;

    /**
     * Seperator of namespaces
     *
     * @var string
     */
    private $_seperator = '\\';

    /**
     * construct 
     *
     * @param  string $name 
     * @param  bool   $reverse 
     * @return void
     */
    public function __construct($name, $reverse = false)
    {
        $this->_name = $name;
        $this->_reverse = $reverse;

        $this->rewind();
    }

    /**
     * Shift the name
     *
     * @param  string $name 
     * @return bool  return false if no more shift needed
     */
    private static function _shiftName(&$prefix, &$suffix, $className)
    {
        $lastNsPos = strrpos($prefix, $this->_seperator);
        if (false === $lastNsPos)
        {
            return false;
        }

        $suffix = substr($className, $lastNsPos);
        $prefix = substr($prefix, 0, $lastNsPos);

        return true;
    }

    /**
     * Rewind the iterator
     *
     * @return void
     */
    public function rewind()
    {
        $this->_end = false;

        if ($this->_reverse)
        {
            $this->_prefix = $this->_name;
            $this->_suffix = '';
        }
        else
        {
            $this->_prefix = '';
            $this->_suffix = $this->_name;
        }
    }

    /**
     * Get the current suffix name
     *
     * @return string
     */
    public function current()
    {
        return $this->_suffix;
    }

    /**
     * Get the current prefix key name
     *
     * @return string
     */
    public function key()
    {
        return $this->_prefix;
    }

    /**
     * Point to the next state
     *
     * @return void
     */
    public function next()
    {
        if ($this->_reverse)
        {
            $lastPos = strrpos($this->_prefix, $this->_seperator);
        }
        else
        {
            $lastPos = strpos($this->_suffix, $this->_seperator);
        }

        if (false === $lastPos)
        {
            $this->_end = true;
            return;
        }

        $suffix = substr($this->_name, $lastPos);
        $prefix = substr($this->_name, 0, $lastPos);
    }

    /**
     * Test if reach the end of name
     *
     * @return bool
     */
    public function valid()
    {
        return $this->_end;
    }
}

?>
