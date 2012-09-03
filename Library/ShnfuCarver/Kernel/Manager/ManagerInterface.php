<?php

/**
 * Interface file for manager
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Manager;

/**
 * Interface for manager
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface ManagerInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public static function getName();

    /**
     * Run
     *
     * @return void
     */
    public function run();

    /**
     * Clean
     *
     * @return void
     */
    public function clean();

    /**
     * Set service registry
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry
     * @return void
     */
    public function setServiceRegistry(\ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry);

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig();
}

?>
