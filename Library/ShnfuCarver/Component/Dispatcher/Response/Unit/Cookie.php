<?php

/**
 * Cookie class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit;

/**
 * Cookie class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Cookie
{
    /**
     * The name
     *
     * @var string
     */
    private $_name = '';

    /**
     * The value
     *
     * @var string
     */
    private $_value = '';

    /**
     * The expire time
     *
     * If set 0, there will not be the expire value in the header.
     * Then the cookie will expire at the end of the session.
     *
     * @var int
     */
    private $_expire = 0;

    /**
     * The path
     *
     * If set empty string, there will not be the expire value in the header.
     * Then the cookie will be available in the current directory that the cookie is being set in.
     *
     * @var string
     */
    private $_path = '';

    /**
     * The domain
     *
     * @var string
     */
    private $_domain = null;

    /**
     * The secure
     *
     * @var bool
     */
    private $_secure = false;

    /**
     * The http only
     *
     * @var bool
     */
    private $_httpOnly = true;

    /**
     * construct
     *
     * @param  string $name
     * @param  string $value
     * @param  int    $expire
     * @param  string $path
     * @param  string $domain
     * @param  bool   $secure
     * @param  bool   $httpOnly
     * @return void
     */
    public function __construct($name, $value = '', $expire = 0, $path = '', $domain = null, $secure = false, $httpOnly = true )
    {
        // from PHP source code
        if (preg_match("/[=,; \t\r\n\013\014]/", $name)) {
            throw new \InvalidArgumentException("The cookie name \"$name\" contains invalid characters."));
        }

        if (empty($name)) {
            throw new \InvalidArgumentException('The cookie name cannot be empty.');
        }

        $this->_name     = $name;
        $this->_value    = $value;
        $this->_expire   = $expire;
        $this->_path     = $path;
        $this->_domain   = $domain;
        $this->_secure   = (bool)$secure;
        $this->_httpOnly = (bool)$httpOnly;
    }

    /**
     * Get cookie name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Get cookie value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->_name;
    }

    /**
     * Get cookie expire time
     *
     * @return int
     */
    public function getExpire()
    {
        return $this->_expire;
    }

    /**
     * Get cookie path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Get cookie domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->_domain;
    }

    /**
     * Check the cookie secure
     *
     * @return bool
     */
    public function isSecure()
    {
        return $this->_secure;
    }

    /**
     * Check the cookie http only
     *
     * @return bool
     */
    public function isHttpOnly()
    {
        return $this->_httpOnly;
    }
}

?>
