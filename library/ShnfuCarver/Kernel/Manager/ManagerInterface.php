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
    public function getName();

    /**
     * Run
     *
     * @return void
     */
    public function run();

    /**
     * Initialization
     *
     * @return void
     */
    public function init();

    /**
     * Clean
     *
     * @return void
     */
    public function clean();

    /**
     * Set service repository
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRepository|null $serviceRepository
     * @return void
     */
    public function setServiceRepository($serviceRepository);

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig();

    /**
     * Get config
     *
     * @return array
     */
    public function getConfig();
}

?>
