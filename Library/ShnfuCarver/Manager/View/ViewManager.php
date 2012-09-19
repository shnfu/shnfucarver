<?php

/**
 * View manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\View;

/**
 * View manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\View
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ViewManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        $viewService = $this->_registerService(new \ShnfuCarver\Service\View\ViewService);

        if (isset($this->_config['path']))
        {
            $viewService->addViewDirectory($this->_config['path']);
        }

        parent::init();
    }
}

?>
