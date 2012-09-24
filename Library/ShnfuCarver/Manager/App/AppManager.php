<?php

/**
 * Application manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\App
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\App;

/**
 * Application manager class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Application
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class AppManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->setServiceRepository(new \ShnfuCarver\Kernel\Service\ServiceRepository);

        $config = new \ShnfuCarver\Component\Config\Handler;
        $this->_registerService(new \ShnfuCarver\Kernel\Service\Service($config, 'config'));
    }

    /**
     * Main process of the application
     *
     * @return void
     */
    public function main()
    {
        $this->loadConfig();

        $this->init();

        $this->run();
    }
}

?>
