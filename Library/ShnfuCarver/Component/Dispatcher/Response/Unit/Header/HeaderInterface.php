<?php

/**
 * Header interface file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit\Header;

/**
 * Header interface
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface HeaderInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Retrieve all content
     *
     * @return array
     */
    public function getAll();

    /**
     * Retrieve only the first content
     *
     * @return string
     */
    public function getFirst();

    /**
     * Add content. If this is a unique content, empty the existed one first
     *
     * @param  string $value
     * @return void
     */
    public function add($value);

    /**
     * Send the header
     *
     * @return void
     */
    public function send();
}

?>
