<?php

/**
 * Service config manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager;

/**
 * Service config manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class ConfigManager extends \ShnfuCarver\Kernel\Manager\Manager
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
