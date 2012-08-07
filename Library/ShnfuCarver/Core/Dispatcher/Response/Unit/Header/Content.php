<?php

/**
 * Header content class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Response\Unit\Header;

/**
 * Header content class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Content
{
    /**
     * The header content
     *
     * @var array
     */
    private $_content = array();

    /**
     * The header could appear more than once
     *
     * @var bool
     */
    private $_unique = false;

    /**
     * construct 
     *
     * @param  array|string $header
     * @param  bool         $unique
     * @return void
     */
    public function __construct($content, $unique = false)
    {
        if (!is_string($content) && !is_array($content))
        {
            throw new \InvalidArgumentException('The content must be a string or array!');
        }

        $this->_unique  = (bool)$unique;
        $this->_content = ($unique && count($content)) > 1 ? array_slice($content, -1) : (array)$content;
    }

    /**
     * Retrieve all content
     *
     * @return array
     */
    public function getAll()
    {
        return $this->_content;
    }

    /**
     * Retrieve only the first content
     *
     * @return string
     */
    public function getFirst()
    {
        return isset($this->_content[0]) ? $this->_content[0] : null;
    }

    /**
     * Add content. If this is a unique content, empty the existed one first
     *
     * @param  string $value
     * @return void
     */
    public function add($value)
    {
        if ($this->_unique)
        {
            unset($this->_content);
        }

        $this->_content[] = $value;
    }
}

?>
