<?php

/**
 * Manager with config service class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager;

/**
 * Manager with config service class
 *
 * @package    ShnfuCarver
 * @subpackage Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Manager extends \ShnfuCarver\Kernel\Manager\Manager
{
    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
        $this->_config = $this->_getService('Config')->get($this->getName());
    }
}

?>
