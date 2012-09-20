<?php

/**
 * Class file for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Generator;

/**
 * Class for generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Generator
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Generator implements GeneratorInterface
{
    /**
     * Generate the URI
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command $command
     * @param  bool   $absolute
     * @return string
     */
    abstract public function generate($command, $absolute);
}

?>
