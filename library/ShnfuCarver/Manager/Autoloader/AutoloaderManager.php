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
     * The loader
     *
     * @var array
     */
    protected $_loader;

    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        $this->_autoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

        $standardLoader = $this->_standardLoader();
        if (!empty($standardLoader))
        {
            $this->_loader[] = $standardLoader;
        }

        parent::init();
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        // not empty loader
        if ($this->_loader)
        {
            $this->_autoloader->setLoader($this->_loader);
            $this->_autoloader->register();
        }

        parent::run();
    }

    /**
     * Standard loader
     *
     * @return \ShnfuCarver\Component\Loader\StandardLoader
     */
    protected function _standardLoader()
    {
        $useStandardLoader = isset($this->_config['use_standard_loader'])
            ? $this->_config['use_standard_loader'] : false;
        if (!$useStandardLoader)
        {
            return null;
        }

        $standardLoader = new \ShnfuCarver\Component\Loader\StandardLoader;
        if (is_array($this->_config['standard_loader']))
        {
            foreach ($this->_config['standard_loader'] as $key => $value)
            {
                $standardLoader->add($key, $value);
            }
        }

        return $standardLoader;
    }
}

?>
