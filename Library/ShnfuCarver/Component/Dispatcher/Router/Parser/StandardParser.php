<?php

/**
 * Class file for standard parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Parser;

/**
 * Class for standard parser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Parser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardParser extends Parser
{
    /**
     * Parse a standard path info
     * The form of a standard URI is like:
     * http://www.example.com/index.php/good_forum.display_all_post-param1-param2-last_param
     * Standard path info is:
     * /good_forum.display_all_post-param1-param2-last_param
     *
     * @param  string $pathInfo 
     * @return void
     */
    public function parse($pathInfo)
    {
        $paramPos = strpos($pathInfo, '-');
        if (false === $paramPos)
        {
            $prefix = $pathInfo;
            $paramString = '';
        }
        else
        {
            $prefix = substr($pathInfo, 0, $paramPos);
            $paramString = substr($pathInfo, $paramPos);
        }

        $actionPos = strpos($

        $this->_parameter = explode($paramString, '-');
    }
}

?>
