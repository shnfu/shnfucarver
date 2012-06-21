<?php

/**
 * Singleton traits file
 *
 * @package    ShnfuCarver
 * @subpackage Common\Singleton
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Common\Singleton;

require_once LIBRARY_PATH . '/ShnfuCarver/Common/Callback/Batch.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Php.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Factory.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Handler.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Internal.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Callback.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Handler.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Internal.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Callback.php';

/**
 * Singleton traits
 *
 * Common implementation of singleton
 *
 * @package    ShnfuCarver
 * @subpackage Common\Singleton
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
trait Singleton
{
    /**
     * Singleton instance
     *
     * @var mixed
     */
    private static $_instance;

    /**
     * Get the singleton instance 
     *
     * @return mixed
     */
    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Reset the singleton instance 
     *
     * @return void
     */
    public static function resetInstance()
    {
        unset(self::$_instance);
    }

    /**
     * Constructor, protected
     * 
     * @return void
     */
    protected function __construct()
    {
    }

    /**
     * Clone
     * 
     * @return void
     */
    protected function __clone()
    {
        trigger_error('Clone of ' . __CLASS__ . ' is not allowed!', E_USER_ERROR);
    }
}

?>
