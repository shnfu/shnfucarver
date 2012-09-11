<?php

/**
 * NotFound Controller class file
 *
 * @package    ShnfuCarver
 * @subpackage Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Controller;

/**
 * NotFound Controller class
 *
 * @package    ShnfuCarver
 * @subpackage Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class NotFoundController extends \ShnfuCarver\Kernel\Controller\Controller
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
