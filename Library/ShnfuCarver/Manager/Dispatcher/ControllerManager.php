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
        $command = $this->_get('command');

        $response = $this->_resolve($command);

        $response = $this->_doResponse($response);

        $this->_registerService(new \ShnfuCarver\Kernel\Service\Service($response));

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

        $controllerName = $controller ?: 'Default';
        $controllerName = isset($this->_config['map'][$controllerName]) ? $this->_config['map'][$controllerName] : $controllerName;
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

        $controllerClass->setServiceRepository($this->_serviceRepository);

        return call_user_func_array(array($controllerClass, $actionName), $parameter);
    }

    /**
     * Get the response
     *
     * @param  mixed  $response
     * @return \ShnfuCarver\Component\Dispatcher\Response\Response
     */
    private function _doResponse($response)
    {
        if ($response instanceof \ShnfuCarver\Component\Dispatcher\Response\Response)
        {
            $this->_response = $response;
        }
        else if (is_string($response))
        {
            $this->_response = new \ShnfuCarver\Component\Dispatcher\Response\Response($response);
        }
        else
        {
            throw new \InvalidArgumentException('The response must be a string or an instance of \ShnfuCarver\Component\Dispatcher\Response\Response');
        }
    }
}

?>
