<?php

/**
 * Class file for generator service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Dispatcher;

/**
 * Generator service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class GeneratorService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * Generator
     *
     * @var \ShnfuCarver\Component\Dispatcher\Router\Generator\StandardGenerator
     */
    private $_generator;

    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->_generator = new \ShnfuCarver\Component\Dispatcher\Router\Generator\StandardGenerator;
    }

    /**
     * Generate the URI
     *
     * @param  string $controller
     * @param  string $action
     * @param  array  $parameter
     * @return string
     */
    public function generateUri($controller = '', $action = '', array $parameter = array())
    {
        return call_user_func_array(array($this->_command, $method), $param);
    }
}

?>
