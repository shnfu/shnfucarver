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

namespace ShnfuCarver\Component\Dispatcher\Response\Unit;

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
     * Add header
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Response\Unit\Header\Header $header
     * @return void
     */
    public function add(Header\HeaderInterface $header)
    {
        $headerName = str_replace('-', '_', strtolower($header->getName()));

        if (isset($this->_header[$headerName]))
        {
            $this->_header[$headerName]->add($header->getAll());
        }
        else
        {
            $this->_header[$headerName] = $header;
        }
    }

    /**
     * Exist header
     *
     * @param  string $headerName
     * @return bool
     */
    public function exist($headerName)
    {
        $headerName = str_replace('-', '_', strtolower($header->getName()));
        return isset($this->_header[$headerName]);
    }

    /**
     * Get header with the name
     *
     * @param  string $headerName
     * @return \ShnfuCarver\Component\Dispatcher\Response\Unit\Header\Header
     */
    public function get($headerName)
    {
        $headerName = str_replace('-', '_', strtolower($header->getName()));
        if (!isset($this->_header[$headerName]))
        {
            return null;
        }

        return $this->_header[$headerName];
    }

    /**
     * Get all headers
     *
     * @return array
     */
    public function getAll()
    {
        return $this->_header;
    }
}

?>
