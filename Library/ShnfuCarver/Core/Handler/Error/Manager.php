<?php

/**
 * Error handler manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Handler\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Handler\Error;

/**
 * Error handler Manager class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Handler\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Manager
{
    private $_instance;

    private $_

    public static function errorHandler($errNo, $errStr, $errFile, $errLine, $errContext)
    {

        return true;
    }

    public static function setErrorHandler()
    {
        //date_default_timezone_set('Asia/Shanghai');
        set_error_handler(array('ShnfuCarver\Core\Handler\Error', 'errorHandler'));
    }
}

?>
