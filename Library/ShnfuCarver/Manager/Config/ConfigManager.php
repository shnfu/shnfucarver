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
class ConfigManager extends \ShnfuCarver\Kernel\Manager\Manager
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
     * Run
     *
     * @return void
     */
    public function run()
    {
        if (!$this->_serviceRegistry->exist(\ShnfuCarver\Service\Config\ConfigService::getName()))
        {
            $this->_serviceRegistry->register(new \ShnfuCarver\Service\Config\ConfigService);
        }

        $configService = $this->_getService(\ShnfuCarver\Service\Config\ConfigService::getName());
        $configService->load($this->_configPath);

        parent::run();
    }
}

?>
