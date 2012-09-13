<?php

/**
 * Header collection class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit

/**
 * Header collection class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class HeaderCollection
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
    public function __construct(array $header = array())
    {
        $this->_header = $header;
    }

    /**
     * Send
     *
     * @return void
     */
    public function send()
    {
        if (headers_sent())
        {
            return;
        }

        foreach ($this->_header as $header)
        {
            $header->send();
        }
    }
}

?>
