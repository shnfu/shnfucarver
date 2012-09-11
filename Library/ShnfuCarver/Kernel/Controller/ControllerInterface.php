<?php

/**
 * Controller interface file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Controller;

/**
 * Controller interface
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface ControllerInterface
{
    /**
     * Get name from the class name
     *
     * @return string
     */
    public function getName();

    /**
     * Set service registry
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRegistry|null $serviceRegistry
     * @return void
     */
    public function setServiceRegistry($serviceRegistry);
}

?>
