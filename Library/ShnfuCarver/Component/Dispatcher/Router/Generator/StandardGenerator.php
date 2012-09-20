<?php

/**
 * Class file for standard generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Class for standard generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardGenerator extends Generator
{
    /**
     * The request
     *
     * @var \ShnfuCarver\Component\Dispatcher\Request\Request
     */
    private $_request;

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Request\Request    $request
     * @return void
     */
    public function __construct($request)
    {
        $this->_request = $request;
    }

    /**
     * Generate the URI
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command $command
     * @param  bool   $absolute
     * @return string
     */
    public function generate($command, $absolute = true)
    {

        return $uri;
    }
}

?>
