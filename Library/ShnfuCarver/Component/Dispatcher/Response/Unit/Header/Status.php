<?php

/**
 * Status header class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit\Header;

/**
 * Status header class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit\Header
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Status extends Header
{
    /**
     * The http protocol version
     *
     * @var string
     */
    private $_version = '1.1';

    /**
     * The http status code
     *
     * @var int
     */
    private $_statusCode = 200;

    /**
     * The http status text
     *
     * @var string
     */
    private $_statusText;

    /**
     * The http status text table
     *
     * @var array
     */
    static private $_statusTextTable = array
    (
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
    );

    /**
     * construct 
     *
     * @param  string $version
     * @param  int    $statusCode
     * @param  string $statusText
     * @return void
     */
    public function __construct($statusCode = 200, $statusText = null, $version = '1.1')
    {
        $this->_version    = $version;
        $this->_statusCode = $statusCode;
        if (!$this->isValid())
        {
            throw new \InvalidArgumentException("The HTTP status code $statusCode is not valid.");
        }

        $this->_statusText = (null !== $statusText)
            ? (string)$statusText
            : (isset(self::$_statusTextTable[$statusCode]) ? self::$_statusTextTable[$statusCode] : '');

        parent::__construct('Status', $this->_statusText);
    }

    /**
     * Get the header
     *
     * @return string
     */
    public function getStatusHeader()
    {
        return 'HTTP/' . $this->_version . ' ' . $this->_statusCode . ' ' . $this->_statusText;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->_statusCode >= 100 && $this->_statusCode < 600;
    }

    /**
     * @return bool
     */
    public function isInformational()
    {
        return $this->_statusCode >= 100 && $this->_statusCode < 200;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->_statusCode >= 200 && $this->_statusCode < 300;
    }

    /**
     * @return bool
     */
    public function isRedirection()
    {
        return $this->_statusCode >= 300 && $this->_statusCode < 400;
    }

    /**
     * @return bool
     */
    public function isClientError()
    {
        return $this->_statusCode >= 400 && $this->_statusCode < 500;
    }

    /**
     * @return bool
     */
    public function isServerError()
    {
        return $this->_statusCode >= 500 && $this->_statusCode < 600;
    }

    /**
     * @return bool
     */
    public function isOk()
    {
        return 200 === $this->_statusCode;
    }

    /**
     * @return bool
     */
    public function isForbidden()
    {
        return 403 === $this->_statusCode;
    }

    /**
     * @return bool
     */
    public function isNotFound()
    {
        return 404 === $this->_statusCode;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return in_array($this->_statusCode, array(201, 301, 302, 303, 307));
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return in_array($this->_statusCode, array(201, 204, 304));
    }
}

?>
