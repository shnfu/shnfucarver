<?php

/**
 * Header class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit\Header;

/**
 * Header class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Header implements HeaderInterface
{
    /**
     * The header name
     *
     * @var string
     */
    private $_name = '';

    /**
     * The header content
     *
     * @var array
     */
    private $_content = array();

    /**
     * The header could not appear more than once
     *
     * @var bool
     */
    private $_unique = false;

    /**
     * construct 
     *
     * @param  string       $name
     * @param  array|string $content
     * @param  bool         $unique
     * @return void
     */
    public function __construct($name, $content = null, $unique = true)
    {
        $this->_name = $name;
        $this->_unique = (bool)$unique;
        $this->add($content);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
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
     * @param  string|array $content
     * @return void
     */
    public function add($content)
    {
        if (empty($content))
        {
            return;
        }

        if (!is_string($content) && !is_array($content))
        {
            throw new \InvalidArgumentException('The content must be a string or array!');
        }

        $this->_content = ($this->_unique && count($content)) > 1 ? array_slice($content, -1) : (array)$content;
    }
}

?>
