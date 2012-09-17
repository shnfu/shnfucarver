<?php

namespace Test;

class EndManager extends \ShnfuCarver\Manager\Manager
{
    public function run()
    {
        echo 'PathInfo: ' . $this->_getService('request')->getPathInfo() . PHP_EOL;

//        $this->_test();

        parent::run();
    }

    private function _test()
    {
        print_r($this->getConfig());

        // Testing...
//        setcookie("cookie[three]", "cookiethree");
//        setcookie("cookie[two]", "cookietwo");
//        setcookie("cookie[one]", "cookieone");

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
