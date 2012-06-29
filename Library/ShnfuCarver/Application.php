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

defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(__DIR__ . '/..'));

require_once LIBRARY_PATH . '/ShnfuCarver/Common/Singleton/Singleton.php';

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
    private $_config = array();

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
        require_once LIBRARY_PATH . '/ShnfuCarver/Common/Callback/Batch.php';
        require_once LIBRARY_PATH . '/ShnfuCarver/Core/Autoloader/Autoloader.php';
        require_once LIBRARY_PATH . '/ShnfuCarver/Core/Autoloader/Callback.php';
        require_once LIBRARY_PATH . '/ShnfuCarver/Core/Autoloader/Internal.php';

        $internalAutoloader = \ShnfuCarver\Core\Autoloader\Internal::getInstance();
        $internalAutoloader->add('', LIBRARY_PATH);

        $callbackList = new \ShnfuCarver\Core\Autoloader\Callback;
        $callbackList->append(array($internalAutoloader, 'autoload'));

        $autoloader = \ShnfuCarver\Core\Autoloader\Autoloader::getInstance();
        $autoloader->setCallbackList($callbackList);
        $autoloader->setAutoloader();
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
        $callbackList->append(array('\ShnfuCarver\Core\Error\Handler\Internal', 'handle'));

        $errorHandler = \ShnfuCarver\Core\Error\Handler\Handler::getInstance();
        $errorHandler->setCallbackList($callbackList);

        $errorHandler->register();
    }

    /**
     * Load exception handler 
     *
     * @return void
     */
    private function _loadExceptionHandler()
    {
        $callbackList = new \ShnfuCarver\Core\Exception\Handler\Callback;
        $callbackList->append(array('\ShnfuCarver\Core\Exception\Handler\Internal', 'handle'));

        $exceptionHandler = \ShnfuCarver\Core\Exception\Handler\Handler::getInstance();
        $exceptionHandler->setCallbackList($callbackList);

        $exceptionHandler->register();
    }
}

?>
