<?php

namespace Test;

class TestManager extends \ShnfuCarver\Manager\Manager
{
    public function init()
    {
        //$this->_test();

        parent::init();
    }

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
        $this->_getService('config')->loadAppend(__DIR__ . '/Config/Config.php');

        parent::loadConfig();
    }

    private function _test()
    {
        print_r($this->getConfig());

        // Testing...
        setcookie("cookie[three]", "cookiethree");
        setcookie("cookie[two]", "cookietwo");
        setcookie("cookie[one]", "cookieone");

        $aaa = array();
        echo $aaa['fjls'];
        echo $this->_config['test'] . PHP_EOL;
        echo $this->_config[''] . PHP_EOL;
        echo $this->_getService('config')->get('autoloader')['loader'][1] . PHP_EOL;
        //print_r($this->_serviceRegistry->get('config')->get('autoloader'));
        throw new \InvalidArgumentException('Test an exception');
    }
}

?>
