<?php

/**
 * Interface file for deparser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Deparser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Deparser;

/**
 * Interface for deparser
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Deparser
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
interface DeparserInterface
{
    /**
     * Deparse the command
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command\Command $command
     * @return string
     */
    public function deparse(\ShnfuCarver\Component\Dispatcher\Router\Command\Command $command);
}

?>
