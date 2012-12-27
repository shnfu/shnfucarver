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
class Service implements ServiceInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

    /**
     * Object
     *
     * @var mixed
     */
    protected $_object;

    /**
     * construct
     *
     * @return void
     */
    public function __construct($object, $name = '')
    {
        $this->_object = $object;

        if (!empty($name))
        {
            $this->_name = $name;
        }
    }

    /**
     * Get name from the class name
     *
     * @return string
     */
    public function getName()
    {
        if (!empty($this->_name))
        {
            return $this->_name;
        }

        $this->_name = \ShnfuCarver\Kernel\Misc\Name::extractName(get_class($this->_object));

        return $this->_name;
    }

    /**
     * Get the real object
     *
     * @return mixed
     */
    public function get()
    {
        return $this->_object;
    }
}

?>
