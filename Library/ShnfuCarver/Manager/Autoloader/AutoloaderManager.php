<?php

/**
 * Autoloader manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Manager\Autoloader;

/**
 * Autoloader manager class
 *
 * @package    ShnfuCarver
 * @subpackage Manager\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class AutoloaderManager extends \ShnfuCarver\Manager\Manager
{
    /**
     * The autoloader
     *
     * @var \ShnfuCarver\Component\Autoloader\Autoloader
     */
    protected $_autoloader;

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        $this->_autoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

        $loader = array();

        $internalLoader = $this->_internalLoader();
        if (!empty($internalLoader))
        {
            $loader[] = $internalLoader;
        }

        // not empty loader
        if ($loader)
        {
            $this->_autoloader->setLoader($loader);
            $this->_autoloader->register();
        }

        parent::run();
    }

    /**
     * Internal loader
     *
     * @return \ShnfuCarver\Component\Loader\InternalLoader
     */
    protected function _internalLoader()
    {
        $useInternalLoader = isset($this->_config['use_internal_loader'])
            ? $this->_config['use_internal_loader'] : false;
        if (!$useInternalLoader)
        {
            return null;
        }

        $internalLoader = new \ShnfuCarver\Component\Loader\InternalLoader;
        if (is_array($this->_config['internal_loader']))
        {
            foreach ($this->_config['internal_loader'] as $key => $value)
            {
                $internalLoader->add($key, $value);
            }
        }

        return $internalLoader;
    }
}

?>
