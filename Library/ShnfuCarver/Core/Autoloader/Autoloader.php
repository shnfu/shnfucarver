<?php

/**
 * Autoloader class file
 *
 * @package    ShnfuCarver
 * @subpackage Core\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Autoloader;

/**
 * Autoloader class
 *
 * @package    ShnfuCarver
 * @subpackage Core\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Autoloader
{
    /**
     * The singleton traits
     */
    use \ShnfuCarver\Common\Singleton\Singleton;

    /**
     * Autoloader list 
     *
     * @var \ShnfuCarver\Core\Autoloader\Callback
     */
    private $_autoloaderList;

    /**
     * The main autoload
     *
     * @param  string $name
     * @return void
     */
    public function autoload($name)
    {
        if ($this->_autoloaderList instanceof \ShnfuCarver\Core\Autoloader\Callback)
        {
            $this->_autoloaderList->callList(array($name), true);
        }
    }

    /**
     * Set the autoloader
     *
     * @return bool
     */
    public function setAutoloader()
    {
        return spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Append a new autoloader
     *
     * @param  string|array $callbackList 
     * @return void
     */
    public function setCallbackList($callbackList)
    {
        $this->_autoloaderList = $callbackList;
    }
}

?>
