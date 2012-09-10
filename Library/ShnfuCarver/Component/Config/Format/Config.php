<?php

/**
 * Base class file for any config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config\Format
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Config\Format;

/**
 * Base class for any config
 *
 * @package    ShnfuCarver
 * @subpackage Component\Config\Format
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Config
{
    /**
     * All configuration data stored here
     *
     * @var array
     */
    protected $_data = array();

    /**
     * construct 
     *
     * @param  array $config 
     * @return void
     */
    public function __construct(array $config)
    {
        $this->import($config);
    }

    /**
     * Import config
     *
     * Old config preserved
     * Existed config will be overwritten
     *
     * @param  array $config 
     * @return void
     */
    public function import(array $config)
    {
        $this->_data = array_merge($this->_data, $config);
    }

    /**
     * Retrieve config
     *
     * @return array
     */
    public function retrieve()
    {
        return $this->_data;
    }
}

?>
