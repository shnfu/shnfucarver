<?php

/**
 * File class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Request\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Request\Unit;

/**
 * File class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Request\Unit
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class File extends Parameter
{
    /**
     * construct 
     *
     * @param  array $parameter
     * @return void
     */
    public function __construct(array $parameter)
    {
        parent::__construct($parameter);
    }
}

?>
