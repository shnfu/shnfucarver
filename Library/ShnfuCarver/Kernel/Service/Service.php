<?php

/**
 * Service class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Service;

/**
 * Service class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Service
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Service implements ServiceInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

    /**
     * Get name from the class name
     *
     * @return string
     */
    public function getName()
    {
        if (isset($this->_name))
        {
            return $this->_name;
        }

        $this->_name = \ShnfuCarver\Kernel\Misc\Name::extractName(get_class($this), 'Service');

        return $this->_name;
    }
}

?>
