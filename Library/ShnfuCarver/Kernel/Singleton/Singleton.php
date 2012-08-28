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
        if (!isset(static::$_instance))
        {
            static::$_instance = new static();
        }
        return static::$_instance;
    }

    /**
     * Reset the singleton instance 
     *
     * @return void
     */
    public static function resetInstance()
    {
        unset(static::$_instance);
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
