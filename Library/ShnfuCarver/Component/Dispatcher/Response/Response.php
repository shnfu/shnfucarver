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
     * The status header
     *
     * @var \ShnfuCarver\Component\Dispatcher\Response\Unit\Header\Status
     */
    private $_status;

    /**
     * The headers
     *
     * @var \ShnfuCarver\Component\Dispatcher\Response\Unit\HeaderCollection
     */
    private $_headerCollection;

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
     * @param  string $bodyContent
     * @param  int    $statusCode
     * @param  \ShnfuCarver\Component\Dispatcher\Response\Unit\HeaderCollection $header
     * @return void
     */
    public function __construct($bodyContent = '', $statusCode = 200, $headerCollection = null)
    {
        $this->_status = new Unit\Header\Status($statusCode);
        $this->_body = new Unit\Body($bodyContent);
        $this->_headerCollection = $headerCollection;
    }

    /**
     * Send headers
     *
     * @return void
     */
    private function _sendHeader()
    {
        if (headers_sent())
        {
            return;
        }

        // set the status header
        header($this->_status->getFirst());

        // all other headers
        foreach ($this->_headerCollection->getAll() as $header)
        {
            foreach ($header->getAll() as $content)
            {
                header($header->getName() . ': ' . $content, false);
            }
        }

        // set the cookies
        //$this->_cookie->getAll()
    }

    /**
     * Send body
     *
     * @return void
     */
    private function _sendBody()
    {
        echo $this->_body->getBody();
    }

    /**
     * Send
     *
     * @return void
     */
    public function send()
    {
        $this->_sendHeader();
        $this->_sendBody();
    }
}

?>
