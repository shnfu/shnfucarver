<?php

/**
 * Config manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Config;

/**
 * Config manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ConfigServiceManager extends \ShnfuCarver\Kernel\Manager\Manager
{
    /**
     * Config path
     *
     * @var string
     */
    private $_configPath = '';

    /**
     * construct 
     *
     * @param  string $configPath
     * @return void
     */
    public function __construct($configPath)
    {
        $this->_configPath = $configPath;
    }

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        $configService = new \ShnfuCarver\Service\Config\ConfigService;
        $this->_serviceRegistry->register($configService);

        $configService->load($this->_configPath);
    }
}

?>
