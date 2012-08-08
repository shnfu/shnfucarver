<?php

/**
 * Interface file for loader
 *
 * @package    ShnfuCarver
 * @subpackage Core\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Loader;

/**
 * Interface for loader
 *
 * @package    ShnfuCarver
 * @subpackage Core\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface LoaderInterface
{
    /**
     * Load the file with the name
     *
     * @param  string $name 
     * @return bool  Whether load is successful
     */
    public function load($name);
}

?>
