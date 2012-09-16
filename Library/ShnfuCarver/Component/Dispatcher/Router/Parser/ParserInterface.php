<?php

/**
 * Interface file for parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Parser;

/**
 * Interface for parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface ParserInterface
{
    /**
     * Parse the path info
     *
     * @param  string $pathInfo 
     * @return void
     */
    public function parse($pathInfo);

    /**
     * Get the controller name
     *
     * @return string
     */
    public function getControllerName();

    /**
     * Get the action name
     *
     * @return string
     */
    public function getActionName();

    /**
     * Get the parameters
     *
     * @return array
     */
    public function getParameter();
}

?>
