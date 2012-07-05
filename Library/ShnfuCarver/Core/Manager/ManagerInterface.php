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
     * Initialization
     *
     * @return void
     */
    public function initialize();

    /**
     * Finalization
     *
     * @return void
     */
    public function finalize();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set config
     *
     * @param  array $config 
     * @return void
     */
    public function setConfig($config);
}

?>
