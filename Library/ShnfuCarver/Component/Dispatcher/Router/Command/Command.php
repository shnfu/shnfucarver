<?php

/**
 * Command class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Command
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Command;

/**
 * Command class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Command
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Command
{
    /**
     * The command path
     *
     * @var string
     */
    private $_path = '\\';

    /**
     * The action name
     *
     * @var string
     */
    private $_action = '';

    /**
     * The parameters
     *
     * @var array
     */
    private $_parameter = array();

    /**
     * construct 
     *
     * @param  string $path
     * @param  string $action
     * @param  array  $parameter
     * @return void
     */
    public function __construct($path, $action, array $parameter)
    {
        $this->_path      = $path;
        $this->_action    = $action;
        $this->_parameter = $parameter;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * Get all parameters
     *
     * @return array
     */
    public function getAllParameter()
    {
        return $this->_parameter;
    }
}

?>
