<?php

/**
 * Test manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

//namespace ShnfuCarver\Manager\Error;

/**
 * Error manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Error
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class TestManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Initialization
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute()
    {
        // Testing...
        setcookie("cookie[three]", "cookiethree");
        setcookie("cookie[two]", "cookietwo");
        setcookie("cookie[one]", "cookieone");

        $aaa = array();
        echo $aaa['fjls'];
        echo $this->_config['test'] . PHP_EOL;
        echo $this->_config[''] . PHP_EOL;
        echo $this->_serviceRegistry->get('config')->get('autoloader')['loader'][1] . PHP_EOL;
        //print_r($this->_serviceRegistry->get('config')->get('autoloader'));
        throw new \InvalidArgumentException('lfjklsjdslfj');
    }
}

?>
