<?php

/**
 * Server class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Request\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Request\Unit;

/**
 * Server class
 * Some of the methods are derived from code of the Zend Framework (1.11.11)
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Request\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Server extends Parameter
{
    /**
     * Scheme for http
     *
     */
    const SCHEME_HTTP  = 'http';

    /**
     * Scheme for https
     *
     */
    const SCHEME_HTTPS = 'https';

    /**
     * REQUEST_URI
     * @var string;
     */
    protected $_requestUri = '';

    /**
     * Base URL of request
     * @var string
     */
    protected $_baseUrl = '';

    /**
     * Base path of request
     * @var string
     */
    protected $_basePath = '';

    /**
     * PATH_INFO
     * @var string
     */
    protected $_pathInfo = '';

    /**
     * Raw request body
     * @var string|false
     */
    protected $_rawBody;

    /**
     * Set the REQUEST_URI on which the instance operates
     *
     * If no request URI is passed, uses the value in $_SERVER['REQUEST_URI'],
     * $_SERVER['HTTP_X_REWRITE_URL'], or $_SERVER['ORIG_PATH_INFO'] + $_SERVER['QUERY_STRING'].
     *
     * @param string $requestUri
     * @return Zend_Controller_Request_Http
     */
    public function setRequestUri($requestUri = null)
    {
        if ($requestUri === null) {
            if ($this->has('HTTP_X_REWRITE_URL')) { // check this first so IIS will catch
                $requestUri = $this->get('HTTP_X_REWRITE_URL');
            } elseif (
                // IIS7 with URL Rewrite: make sure we get the unencoded url (double slash problem)
                $this->has('IIS_WasUrlRewritten')
                && $this->get('IIS_WasUrlRewritten') == '1'
                && $this->has('UNENCODED_URL')
                && $this->get('UNENCODED_URL') != ''
                ) {
                $requestUri = $this->get('UNENCODED_URL');
            } elseif ($this->has('REQUEST_URI')) {
                $requestUri = $this->get('REQUEST_URI');
                // Http proxy reqs setup request uri with scheme and host [and port] + the url path, only use url path
                $schemeAndHttpHost = $this->getScheme() . '://' . $this->getHttpHost();
                if (strpos($requestUri, $schemeAndHttpHost) === 0) {
                    $requestUri = substr($requestUri, strlen($schemeAndHttpHost));
                }
            } elseif ($this->has('ORIG_PATH_INFO')) { // IIS 5.0, PHP as CGI
                $requestUri = $this->get('ORIG_PATH_INFO');
                $queryString = $this->get('QUERY_STRING');
                if (!empty($queryString)) {
                    $requestUri .= '?' . $this->get('QUERY_STRING');
                }
            } else {
                return $this;
            }
        } elseif (!is_string($requestUri)) {
            return $this;
//        } else {
//            // Set GET items, if available
//            if (false !== ($pos = strpos($requestUri, '?'))) {
//                // Get key => value pairs and set $_GET
//                $query = substr($requestUri, $pos + 1);
//                parse_str($query, $vars);
//                $this->setQuery($vars);
//            }
        }

        $this->_requestUri = $requestUri;
        return $this;
    }

    /**
     * Returns the REQUEST_URI taking into account
     * platform differences between Apache and IIS
     *
     * @return string
     */
    public function getRequestUri()
    {
        if (empty($this->_requestUri)) {
            $this->setRequestUri();
        }

        return $this->_requestUri;
    }

    /**
     * Set the base URL of the request; i.e., the segment leading to the script name
     *
     * E.g.:
     * - /admin
     * - /myapp
     * - /subdir/index.php
     *
     * Do not use the full URI when providing the base. The following are
     * examples of what not to use:
     * - http://example.com/admin (should be just /admin)
     * - http://example.com/subdir/index.php (should be just /subdir/index.php)
     *
     * If no $baseUrl is provided, attempts to determine the base URL from the
     * environment, using SCRIPT_FILENAME, SCRIPT_NAME, PHP_SELF, and
     * ORIG_SCRIPT_NAME in its determination.
     *
     * @param mixed $baseUrl
     * @return Zend_Controller_Request_Http
     */
    public function setBaseUrl($baseUrl = null)
    {
        if ((null !== $baseUrl) && !is_string($baseUrl)) {
            return $this;
        }

        if ($baseUrl === null) {
            $filename = ($this->has('SCRIPT_FILENAME')) ? basename($this->get('SCRIPT_FILENAME')) : '';

            if ($this->has('SCRIPT_NAME') && basename($this->get('SCRIPT_NAME')) === $filename) {
                $baseUrl = $this->get('SCRIPT_NAME');
            } elseif ($this->has('PHP_SELF') && basename($this->get('PHP_SELF')) === $filename) {
                $baseUrl = $this->get('PHP_SELF');
            } elseif ($this->has('ORIG_SCRIPT_NAME') && basename($this->get('ORIG_SCRIPT_NAME')) === $filename) {
                $baseUrl = $this->get('ORIG_SCRIPT_NAME'); // 1and1 shared hosting compatibility
            } else {
                // Backtrack up the script_filename to find the portion matching
                // php_self
                $path    = $this->has('PHP_SELF') ? $this->get('PHP_SELF') : '';
                $file    = $this->has('SCRIPT_FILENAME') ? $this->get('SCRIPT_FILENAME') : '';
                $segs    = explode('/', trim($file, '/'));
                $segs    = array_reverse($segs);
                $index   = 0;
                $last    = count($segs);
                $baseUrl = '';
                do {
                    $seg     = $segs[$index];
                    $baseUrl = '/' . $seg . $baseUrl;
                    ++$index;
                } while (($last > $index) && (false !== ($pos = strpos($path, $baseUrl))) && (0 != $pos));
            }

            // Does the baseUrl have anything in common with the request_uri?
            $requestUri = $this->getRequestUri();

            if (0 === strpos($requestUri, $baseUrl)) {
                // full $baseUrl matches
                $this->_baseUrl = $baseUrl;
                return $this;
            }

            if (0 === strpos($requestUri, dirname($baseUrl))) {
                // directory portion of $baseUrl matches
                $this->_baseUrl = rtrim(dirname($baseUrl), '/');
                return $this;
            }

            $truncatedRequestUri = $requestUri;
            if (($pos = strpos($requestUri, '?')) !== false) {
                $truncatedRequestUri = substr($requestUri, 0, $pos);
            }

            $basename = basename($baseUrl);
            if (empty($basename) || !strpos($truncatedRequestUri, $basename)) {
                // no match whatsoever; set it blank
                $this->_baseUrl = '';
                return $this;
            }

            // If using mod_rewrite or ISAPI_Rewrite strip the script filename
            // out of baseUrl. $pos !== 0 makes sure it is not matching a value
            // from PATH_INFO or QUERY_STRING
            if ((strlen($requestUri) >= strlen($baseUrl))
                && ((false !== ($pos = strpos($requestUri, $baseUrl))) && ($pos !== 0)))
            {
                $baseUrl = substr($requestUri, 0, $pos + strlen($baseUrl));
            }
        }

        $this->_baseUrl = rtrim($baseUrl, '/');
        return $this;
    }

    /**
     * Everything in REQUEST_URI before PATH_INFO
     * <form action="<?=$baseUrl?>/news/submit" method="POST"/>
     *
     * @return string
     */
    public function getBaseUrl($raw = false)
    {
        if (empty($this->_baseUrl)) {
            $this->setBaseUrl();
        }

        return (($raw == false) ? urldecode($this->_baseUrl) : $this->_baseUrl);
    }

    /**
     * Set the base path for the URL
     *
     * @param string|null $basePath
     * @return Zend_Controller_Request_Http
     */
    public function setBasePath($basePath = null)
    {
        if ($basePath === null) {
            $filename = ($this->has('SCRIPT_FILENAME'))
                      ? basename($this->get('SCRIPT_FILENAME'))
                      : '';

            $baseUrl = $this->getBaseUrl();
            if (empty($baseUrl)) {
                $this->_basePath = '';
                return $this;
            }

            if (basename($baseUrl) === $filename) {
                $basePath = dirname($baseUrl);
            } else {
                $basePath = $baseUrl;
            }
        }

        if (substr(PHP_OS, 0, 3) === 'WIN') {
            $basePath = str_replace('\\', '/', $basePath);
        }

        $this->_basePath = rtrim($basePath, '/');
        return $this;
    }

    /**
     * Everything in REQUEST_URI before PATH_INFO not including the filename
     * <img src="<?=$basePath?>/images/zend.png"/>
     *
     * @return string
     */
    public function getBasePath()
    {
        if (empty($this->_basePath)) {
            $this->setBasePath();
        }

        return $this->_basePath;
    }

    /**
     * Set the PATH_INFO string
     *
     * @param string|null $pathInfo
     * @return Zend_Controller_Request_Http
     */
    public function setPathInfo($pathInfo = null)
    {
        if ($pathInfo === null) {
            $baseUrl = $this->getBaseUrl(); // this actually calls setBaseUrl() & setRequestUri()
            $baseUrlRaw = $this->getBaseUrl(false);
            $baseUrlEncoded = urlencode($baseUrlRaw);
        
            if (null === ($requestUri = $this->getRequestUri())) {
                return $this;
            }
        
            // Remove the query string from REQUEST_URI
            if ($pos = strpos($requestUri, '?')) {
                $requestUri = substr($requestUri, 0, $pos);
            }
            
            if (!empty($baseUrl) || !empty($baseUrlRaw)) {
                if (strpos($requestUri, $baseUrl) === 0) {
                    $pathInfo = substr($requestUri, strlen($baseUrl));
                } elseif (strpos($requestUri, $baseUrlRaw) === 0) {
                    $pathInfo = substr($requestUri, strlen($baseUrlRaw));
                } elseif (strpos($requestUri, $baseUrlEncoded) === 0) {
                    $pathInfo = substr($requestUri, strlen($baseUrlEncoded));
                } else {
                    $pathInfo = $requestUri;
                }
            } else {
                $pathInfo = $requestUri;
            }
        
        }

        $this->_pathInfo = (string) $pathInfo;
        return $this;
    }

    /**
     * Returns everything between the BaseUrl and QueryString.
     * This value is calculated instead of reading PATH_INFO
     * directly from $_SERVER due to cross-platform differences.
     *
     * @return string
     */
    public function getPathInfo()
    {
        if (empty($this->_pathInfo)) {
            $this->setPathInfo();
        }

        return $this->_pathInfo;
    }

    /**
     * Return the method by which the request was made
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->get('REQUEST_METHOD');
    }

    /**
     * Was the request made by POST?
     *
     * @return bool
     */
    public function isPost()
    {
        if ('POST' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by GET?
     *
     * @return bool
     */
    public function isGet()
    {
        if ('GET' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by PUT?
     *
     * @return bool
     */
    public function isPut()
    {
        if ('PUT' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by DELETE?
     *
     * @return bool
     */
    public function isDelete()
    {
        if ('DELETE' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by HEAD?
     *
     * @return bool
     */
    public function isHead()
    {
        if ('HEAD' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Was the request made by OPTIONS?
     *
     * @return bool
     */
    public function isOptions()
    {
        if ('OPTIONS' == $this->getMethod()) {
            return true;
        }

        return false;
    }

    /**
     * Is the request a Javascript XMLHttpRequest?
     *
     * Should work with Prototype/Script.aculo.us, possibly others.
     *
     * @return bool
     */
    public function isXmlHttpRequest()
    {
        return ($this->getHeader('X_REQUESTED_WITH') == 'XMLHttpRequest');
    }

    /**
     * Is this a Flash request?
     *
     * @return bool
     */
    public function isFlashRequest()
    {
        $header = strtolower($this->getHeader('USER_AGENT'));
        return (strstr($header, ' flash')) ? true : false;
    }

    /**
     * Is https secure request
     *
     * @return bool
     */
    public function isSecure()
    {
        return ($this->getScheme() === self::SCHEME_HTTPS);
    }

    /**
     * Return the raw body of the request, if present
     *
     * @return string|false Raw body, or false if not present
     */
    public function getRawBody()
    {
        if (null === $this->_rawBody) {
            $body = file_get_contents('php://input');

            if (strlen(trim($body)) > 0) {
                $this->_rawBody = $body;
            } else {
                $this->_rawBody = false;
            }
        }
        return $this->_rawBody;
    }

    /**
     * Return the value of the given HTTP header. Pass the header name as the
     * plain, HTTP-specified header name. Ex.: Ask for 'Accept' to get the
     * Accept header, 'Accept-Encoding' to get the Accept-Encoding header.
     *
     * @param string $header HTTP header name
     * @return string|false HTTP header value, or false if not found
     * @throws \InvalidArgumentException
     */
    public function getHeader($header)
    {
        if (empty($header)) {
            throw new \InvalidArgumentException('An HTTP header name is required');
        }

        // Try to get it from the $_SERVER array first
        $temp = 'HTTP_' . strtoupper(str_replace('-', '_', $header));
        if ($this->has($temp)) {
            return $this->get($temp);
        }

        // This seems to be the only way to get the Authorization header on
        // Apache
        if (function_exists('apache_request_headers')) {
            $headers = apache_request_headers();
            if (isset($headers[$header])) {
                return $headers[$header];
            }
            $header = strtolower($header);
            foreach ($headers as $key => $value) {
                if (strtolower($key) == $header) {
                    return $value;
                }
            }
        }

        return false;
    }

    /**
     * Get the request URI scheme
     *
     * @return string
     */
    public function getScheme()
    {
        return ($this->get('HTTPS') == 'on') ? self::SCHEME_HTTPS : self::SCHEME_HTTP;
    }

    /**
     * Get the HTTP host.
     *
     * "Host" ":" host [ ":" port ] ; Section 3.2.2
     * Note the HTTP Host header is not the same as the URI host.
     * It includes the port while the URI host doesn't.
     *
     * @return string
     */
    public function getHttpHost()
    {
        $host = $this->get('HTTP_HOST');
        if (!empty($host)) {
            return $host;
        }

        $scheme = $this->getScheme();
        $name   = $this->get('SERVER_NAME');
        $port   = $this->get('SERVER_PORT');

        if(null === $name) {
            return '';
        }
        elseif (($scheme == self::SCHEME_HTTP && $port == 80) || ($scheme == self::SCHEME_HTTPS && $port == 443)) {
            return $name;
        } else {
            return $name . ':' . $port;
        }
    }

    /**
     * Get the client's IP addres
     *
     * @param  bool $checkProxy
     * @return string
     */
    public function getClientIp($checkProxy = true)
    {
        if ($checkProxy && $this->get('HTTP_CLIENT_IP') != null) {
            $ip = $this->get('HTTP_CLIENT_IP');
        } else if ($checkProxy && $this->get('HTTP_X_FORWARDED_FOR') != null) {
            $ip = $this->get('HTTP_X_FORWARDED_FOR');
        } else {
            $ip = $this->get('REMOTE_ADDR');
        }

        return $ip;
    }
}

?>
