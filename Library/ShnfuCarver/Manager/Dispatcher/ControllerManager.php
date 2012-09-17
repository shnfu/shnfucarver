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
        $controller = $command->getController();
        $action     = $command->getAction();
        $parameter  = $command->getAllParameter();

        $controllerName = isset($this->_config['map'][$controller]) ? $this->_config['map'][$controller] : $controller;
        $controllerName = $controllerName   ?: '\Default';
        $actionName     = $action ?: 'index';

        $controllerName = $controllerName   . 'Controller';
        $actionName     = $actionName . 'Action';

        $notFound = true;
        if (class_exists($controllerName))
        {
            $controllerClass = new $controllerName;

            if ($controllerClass instanceof \ShnfuCarver\Kernel\Controller\ControllerInterface)
            {
                if (method_exists($controllerClass, $actionName))
                {
                    $notFound = false;
                }
                else
                {
                    if (method_exists($controllerClass, 'notFoundAction'))
                    {
                        $notFound = false;
                    }
                    else
                    {
                        $actionName = 'notFoundAction';
                    }
                }
            }
        }

        if ($notFound)
        {
            $controllerClass  = new \ShnfuCarver\Controller\NotFoundController;
            $actionName       = 'indexAction';
        }

        $controllerClass->setServiceRegistry($this->_serviceRegistry);

        return call_user_func_array(array($controllerClass, $actionName), $parameter);
    }
}

?>
