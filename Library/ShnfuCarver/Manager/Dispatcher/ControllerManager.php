<?php

/**
 * Controller manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Dispatcher;

/**
 * Controller manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Dispatcher
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class ControllerManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $commandService = $this->_getService('command');

        $command = $commandService->getCommand();

        $response = $this->_resolve($command);

        $responseService = $this->_registerService(new \ShnfuCarver\Service\Dispatcher\ResponseService);
        $responseService->setResponse($response);

        parent::run();
    }

    /**
     * Resolve a Command
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command\Command $command
     * @return void
     */
    private function _resolve($command)
    {
        $path      = $command->getPath();
        $action    = $command->getAction();
        $parameter = $command->getAllParameter();

        $pathName   = $path . 'Controller';
        $actionName = $action . 'Action';

        $notFound = true;
        if (class_exists($pathName))
        {
            $pathClass = new $pathName;

            if ($pathClass instanceof \ShnfuCarver\Kernel\Controller\ControllerInterface
                    && method_exists($pathClass, $actionName))
            {
                $notFound = false;
            }
        }

        if ($notFound)
        {
            $pathClass  = new \ShnfuCarver\Controller\NotFoundController;
            $actionName = 'indexAction';
        }

        $pathClass->setServiceRegistry($this->_serviceRegistry);

        return call_user_func_array(array($pathClass, $actionName), $parameter);
    }
}

?>
