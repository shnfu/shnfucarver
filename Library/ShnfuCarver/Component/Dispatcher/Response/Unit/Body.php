<?php

/**
 * Body class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response\Unit;

/**
 * Parameter class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Body
{
    /**
     * The content of body
     *
     * @var string
     */
    private $_body = '';

    /**
     * construct 
     *
     * @param  string $content
     * @return void
     */
    public function __construct($body)
    {
        $this->_body = $body;
    }

    /**
     * Get content of body
     *
     * @return void
     */
    public function getBody()
    {
        return $this->_body;
    }
}

?>
