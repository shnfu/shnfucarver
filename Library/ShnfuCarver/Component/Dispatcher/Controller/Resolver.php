<?php

/**
 * Resolver class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Controller;

/**
 * Resolver class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Resolver
{
    /**
     * Resolve a Command
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Command\Command $command
     * @return string|\ShnfuCarver\Component\Dispatcher\Response\Response
     */
    public function resolve($command)
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

            if (method_exists($pathClass, $actionName))
            {
                $notFound = false;
            }
        }

        if ($notFound)
        {
            $pathClass  = new \ShnfuCarver\Component\Dispatcher\Controller\NotFoundController;
            $actionName = 'indexAction';
        }

        return call_user_func_array(array($pathClass, $actionName), $parameter);
    }
}

?>
