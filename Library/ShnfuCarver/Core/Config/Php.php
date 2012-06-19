<?php

/**
 * Php class file for php config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Config;

/**
 * Php class for php config
 *
 * @package    ShnfuCarver
 * @subpackage Core\Config
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Php
{
    /**
     * Construct 
     *
     * @param  string $filePath 
     * @return void
     */
    public function __construct($filePath)
    {
        $data = include $filePath;
        if (!is_array($data))
        {
            throw new ..\Exception('The configuration file should return an array!');
        }

        parent::__construct($data);
    }
}

?>
