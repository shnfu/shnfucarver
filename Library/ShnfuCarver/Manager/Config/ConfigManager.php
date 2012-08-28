<?php

/**
 * Config manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager\Config;

/**
 * Config manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ConfigManager extends \ShnfuCarver\Core\Manager\Manager
{
    /**
     * The autoloader
     *
     * @var \ShnfuCarver\Core\Config\Config
     */
    protected $_autoloader;

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        $this->_autoloader = new \ShnfuCarver\Core\Autoloader\Autoloader;

        $loader = array();

        $internalLoader = $this->_internalLoader();
        if (false !== $internalLoader)
        {
            $loader[] = $internalLoader;
        }

        // not empty loader
        if ($loader)
        {
            $this->_autoloader->setLoader($loader);
            $this->_autoloader->register();
        }
    }
}

?>
