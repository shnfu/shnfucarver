<?php

/**
 * Application class file
 *
 * @package    ShnfuCarver
 * @subpackage Core
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core;

require_once LIBRARY_PATH . '/ShnfuCarver/Common/Callback/Batch.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Php.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Config/Factory.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Exception/Base.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Handler.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Internal.php';
require_once LIBRARY_PATH . '/ShnfuCarver/Core/Error/Callback.php';

/**
 * Application class
 *
 * Control the process of the application
 *
 * @package    ShnfuCarver
 * @subpackage Core
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Application
{
    /**
     * Configuration of application 
     *
     * @var \ShnfuCarver\Core\Config\Base
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

        $this->_loadConfig($configPath);

        $this->_loadErrorHandler();

        echo $fjdlsjf;
    }

    /**
     * Load configuration 
     *
     * @param  string $configPath 
     * @return void
     */
    private function _loadConfig($configPath)
    {
        $this->_config = Config\Factory::useConfig($configPath);
    }

    private function _loadErrorHandler()
    {
        $callbackList = new \ShnfuCarver\Core\Error\Callback;
        $callbackList->append(array('\ShnfuCarver\Core\Error\Internal', 'handler'));

        $errorHandler = \ShnfuCarver\Core\Error\Handler::getInstance();
        $errorHandler->setCallbackList($callbackList);

        $errorHandler->setErrorHandler();
    }
}

?>
