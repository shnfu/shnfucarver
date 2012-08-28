<?php

/**
 * Service manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Manager\Service;

/**
 * Service manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Manager\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ServiceManager extends \ShnfuCarver\Core\Manager\Manager
{
    /**
     * The autoloader
     *
     * @var \ShnfuCarver\Core\Service\Service
     */
    protected $_serviceRegistry;

    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
        $this->_serviceRegistry = new \ShnfuCarver\Kernel\Service\ServiceRegistry;

        $this->_serviceRegistry->register(new
    }
}

?>
