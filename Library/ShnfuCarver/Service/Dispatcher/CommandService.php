<?php

/**
 * Class file for command service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Dispatcher;

/**
 * Command service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class CommandService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * Command
     *
     * @var Command
     */
    protected $_command;

    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Set command
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command\Command $command
     * @return mixed
     */
    public function setCommand(\ShnfuCarver\Component\Dispatcher\Router\Command\Command $command)
    {
        $this->_command = $command;
    }

    /**
     * Get command
     *
     * @return \ShnfuCarver\Component\Dispatcher\Router\Command\Command
     */
    public function getCommand()
    {
        return $this->_command;
    }

    /**
     * Call methods of command
     *
     * @param  string $method
     * @param  array  $param
     * @return mixed
     */
    public function __call($method, array $param)
    {
        if (!method_exists($this->_command, $method))
        {
            throw new \BadMethodCallException("Method '$method' for CommandService does not exist!");
        }

        return call_user_func_array(array($this->_command, $method), $param);
    }
}

?>
