<?php

/**
 * Cookie collection class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit;

/**
 * Cookie collection class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class CookieCollection
{
    /**
     * The cookie
     *
     * @var array
     */
    private $_cookie = array();

    /**
     * construct
     *
     * @param  array $cookie
     * @return void
     */
    public function __construct(array $cookie = array())
    {
        $this->_cookie = $cookie;
    }

    /**
     * Add cookie
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Response\Unit\Cookie $cookie
     * @return void
     */
    public function add(Cookie $cookie)
    {
        $cookieName = str_replace('-', '_', strtolower($cookie->getName()));

        $this->_cookie[$cookieName] = $cookie;
    }

    /**
     * Exist cookie
     *
     * @param  string $cookieName
     * @return bool
     */
    public function exist($cookieName)
    {
        $cookieName = str_replace('-', '_', strtolower($cookie->getName()));
        return isset($this->_cookie[$cookieName]);
    }

    /**
     * Get cookie with the name
     *
     * @param  string $cookieName
     * @return \ShnfuCarver\Component\Dispatcher\Response\Unit\Cookie
     */
    public function get($cookieName)
    {
        $cookieName = str_replace('-', '_', strtolower($cookie->getName()));
        if (!isset($this->_cookie[$cookieName]))
        {
            return null;
        }

        return $this->_cookie[$cookieName];
    }

    /**
     * Get all cookies
     *
     * @return array
     */
    public function getAll()
    {
        return $this->_cookie;
    }
}

?>
