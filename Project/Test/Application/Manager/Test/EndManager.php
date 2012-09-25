<?php

namespace Test;

class EndManager extends \ShnfuCarver\Manager\Manager
{
    public function run()
    {
        echo PHP_EOL . 'RequestUri: ' . $this->_get('request')->getRequestUri() . PHP_EOL;
        echo PHP_EOL . 'BaseUrl: '    . $this->_get('request')->getBaseUrl() . PHP_EOL;
        echo PHP_EOL . 'BasePath: '   . $this->_get('request')->getBasePath() . PHP_EOL;
        echo PHP_EOL . 'PathInfo: '   . $this->_get('request')->getPathInfo() . PHP_EOL;
        echo PHP_EOL . 'HttpHost: '   . $this->_get('request')->getHttpHost() . PHP_EOL;

//        $this->_test();
        $this->_testGenerator();

//        echo 'Name:  ' . \ShnfuCarver\Kernel\Misc\Name::extractName('FineGoodDataHahaXixiSFDSData', 'Data');

        parent::run();
    }

    private function _testGenerator()
    {
        echo 'Generate: ' . $this->_get('generator')->generateUri('', '', array('f123', 'hello'));
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
        echo $this->_get('config')->get('autoloader')['loader'][1] . PHP_EOL;
        //print_r($this->_serviceRegistry->get('config')->get('autoloader'));
        throw new \InvalidArgumentException('Test an exception');
    }
}

?>
