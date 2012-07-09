<?php

/**
 * Path info class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Entity
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Dispatcher\Entity;

/**
 * Path info class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Dispatcher\Entity
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Path
{
    /**
     * The path info
     *
     * @var string
     */
    private $_path = '';

    /**
     * construct 
     *
     * @param  string $path 
     * @return void
     */
    public function __construct($path)
    {
        $this->_path = $path;
    }
}

?>
