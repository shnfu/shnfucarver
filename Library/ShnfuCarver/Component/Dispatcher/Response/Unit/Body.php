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
    private $_content = '';

    /**
     * construct 
     *
     * @param  string $content
     * @return void
     */
    public function __construct($content)
    {
        $this->_content = $content;
    }

    /**
     * Send
     *
     * @return bool
     */
    public function send()
    {
        echo $this->_content;
    }
}

?>
