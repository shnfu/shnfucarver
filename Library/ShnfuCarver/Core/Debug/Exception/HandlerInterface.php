<?php

/**
 * Interface file for exception handler
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Debug\Exception;

/**
 * Interface for exception handler
 *
 * @package    ShnfuCarver
 * @subpackage Core\Debug\Exception
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface HandlerInterface
{
    /**
     * The exception handler 
     *
     * @param  \Exception $exception 
     * @return bool
     */
    public function handle(\Exception $exception);
}

?>
