<?php

/**
 * Application class file
 *
 * @package    ShnfuCarver
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver;

require_once LIBRARY_PATH . '/ShnfuCarver/Common/Callback/Batch.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Common/Singleton/Singleton.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Php.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Factory.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Handler.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Internal.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Handler/Callback.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Handler.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Internal.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler/Callback.php';

/**
 * Application class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Application
{
    /**
     * The singleton traits
     */
    use \ShnfuCarver\Common\Singleton\Singleton;

    /**
     * Configuration of application 
     *
     * @var \ShnfuCarver\Core\Config\Base
     */
    private $_configObject;

    /**
     * Configuration of application 
     *
     * @var array
     */
    private $_config;

    /**
     * Main process of the application 
     *
     * @param  string $configPath 
     * @return void
     */
    public function run($configPath)
    {
        date_default_timezone_set('Asia/Shanghai');

        $this->_loadAutoloader();

        $this->_loadConfig($configPath);

        $this->_loadErrorHandler();

        $this->_loadExceptionHandler();

        echo $this->_config['test'];
    }

    /**
     * Load autoloader 
     *
     * @return void
     */
    private function _loadAutoloader()
    {
        require_once LIBRARY_PATH . '/ShnfuCarver/Core/Autoloader/Internal.php';
        $autoloader = \ShnfuCarver\Core\Autoloader\Internal::getInstance();
        $autoloader->add('\haha\xixi\hehe\xuxu', '/home/phtiger/public_html/ShnfuCarver/Library/ShnfuCarver/Core/Autoloader/test/Config/Base.php');
        $autoloader->add('\haha\xixi\hehe\\', '/home/phtiger/public_html/ShnfuCarver/Library/ShnfuCarver/Core/Autoloader/test/Config/');
        $autoloader->add('\\', '/home/phtiger/public_html/ShnfuCarver/Library');
        $autoloader->autoload('haha\xixi\hehe\xuxu');
        $autoloader->autoload('\haha\xixi\hehe');
        $autoloader->autoload('\haha\xixi\hehe\Face');
        $autoloader->autoload('ShnfuCarver\Core\Error\Handler\Handler');
    }

    /**
     * Load configuration 
     *
     * @param  string $configPath 
     * @return void
     */
    private function _loadConfig($configPath)
    {
        $this->_configObject = \ShnfuCarver\Core\Config\Factory::useConfig($configPath);
        $this->_config = $this->_configObject->retrieve();
    }

    /**
     * Load error handler 
     *
     * @return void
     */
    private function _loadErrorHandler()
    {
        $callbackList = new \ShnfuCarver\Core\Error\Handler\Callback;
        $callbackList->append(array('\ShnfuCarver\Core\Error\Handler\Internal', 'handler'));

        $errorHandler = \ShnfuCarver\Core\Error\Handler\Handler::getInstance();
        $errorHandler->setCallbackList($callbackList);

        $errorHandler->setErrorHandler();
    }

    /**
     * Load exception handler 
     *
     * @return void
     */
    private function _loadExceptionHandler()
    {
        $callbackList = new \ShnfuCarver\Core\Exception\Handler\Callback;
        $callbackList->append(array('\ShnfuCarver\Core\Exception\Handler\Internal', 'handler'));

        $exceptionHandler = \ShnfuCarver\Core\Exception\Handler\Handler::getInstance();
        $exceptionHandler->setCallbackList($callbackList);

        $exceptionHandler->setExceptionHandler();
    }
}

?>
