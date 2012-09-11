<?php

class DemoController extends \ShnfuCarver\Kernel\Controller\Controller
{
    public function indexAction()
    {
        return 'This is a demo!';
    }

    public function otherAction()
    {
        $param = func_get_args();
        return 'This is other action of the demo!' . '  Param is: ' . $param[0];
    }

    public function viewAction()
    {
        return $this->_getService('view')->load('jq.view.php', 'html');
    }
}

?>
