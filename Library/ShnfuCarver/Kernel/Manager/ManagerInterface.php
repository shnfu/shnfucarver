<?php

/**
 * Interface file for manager
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager;

/**
 * Interface for manager
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager
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
     * Initialization
     *
     * @return void
     */
    public function initialize();

    /**
     * Execution
     *
     * @return void
     */
    public function execute();

    /**
     * Finalization
     *
     * @return void
     */
    public function finalize();

    /**
     * Set service registry
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry
     * @return void
     */
    public function setService(\ShnfuCarver\Kernel\Service\ServiceRegistry $serviceRegistry);
}

?>
