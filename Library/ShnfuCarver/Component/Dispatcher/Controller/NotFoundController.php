<?php

/**
 * NotFound Controller class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Controller;

/**
 * NotFound Controller class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class NotFoundController extends Controller
{
    /**
     * Index action
     *
     * @return string
     */
    public function indexAction()
    {
        return 'Not Found!!!';
    }
}

?>
