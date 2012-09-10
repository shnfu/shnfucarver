<?php

/**
 * Response class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response;

/**
 * Response class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Response
{
    /**
     * The headers
     *
     * @var \ShnfuCarver\Component\Dispatcher\Response\Unit\Header
     */
    private $_header;

    /**
     * The cookies
     *
     * @var \ShnfuCarver\Component\Dispatcher\Response\Unit\Cookie
     */
    private $_cookie;

    /**
     * The body
     *
     * @var \ShnfuCarver\Component\Dispatcher\Response\Unit\Body
     */
    private $_body;

    /**
     * construct 
     *
     * @param  array $header
     * @return void
     */
    public function __construct($bodyContent)
    {
        $this->_body = new Unit\Body($bodyContent);
    }

    /**
     * Send
     *
     * @return bool
     */
    public function send()
    {
        $this->_body->send();

        return true;
    }
}

?>
