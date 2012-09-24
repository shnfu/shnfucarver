<?php

namespace Test;

class EndManager extends \ShnfuCarver\Manager\Manager
{
    public function run()
    {
        echo PHP_EOL . 'PathInfo: ' . $this->_get('request')->getPathInfo() . PHP_EOL;

//        $this->_test();
        $this->_testGenerator();

//        echo 'Name:  ' . \ShnfuCarver\Kernel\Misc\Name::extractName('FineGoodDataHahaXixiSFDSData', 'Data');

        parent::run();
    }

    private function _testGenerator()
    {
        $deparser = new \ShnfuCarver\Component\Dispatcher\Router\Deparser\StandardDeparser;
        $generator = new \ShnfuCarver\Component\Dispatcher\Router\Generator\Generator($deparser);
        echo 'Generate: ' . $generator->generate(new \ShnfuCarver\Component\Dispatcher\Router\Command\Command('', 'index', array('f123', 'hello')));
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
