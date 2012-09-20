<?php

/**
 * Interface file for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Interface for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface GeneratorInterface
{
    /**
     * Generate the URI
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command $command
     * @param  bool   $absolute
     * @return string
     */
    public function generate($command, $absolute);
}

?>
