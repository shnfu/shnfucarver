<?php

namespace Test\Controller;

class DemoController extends \ShnfuCarver\Kernel\Controller\Controller
{
    public function indexAction()
    {
        return 'This is a demo!';
    }

    public function otherAction()
    {
        $param = func_get_args();
        return 'This is other action of the demo!' . '  Param is: ' . $param[0] . PHP_EOL;
    }

    public function viewAction()
    {
        return $this->_get('view')->load('jq.view.html');
    }

    public function helloAction()
    {
        $param = array
        (
            'h' => 'Hello',
            'w' => 'World',
        );
        return $this->_get('view')->load('hello.view.php', $param);
    }

    public function redirectAction()
    {
        //return new \ShnfuCarver\Component\Dispatcher\Response\RedirectResponse('http://www.baidu.com');
        return new \ShnfuCarver\Component\Dispatcher\Response\RedirectResponse('demo.view');
    }
}

?>
