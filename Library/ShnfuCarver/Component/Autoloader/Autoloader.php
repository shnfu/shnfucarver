<?php

/**
 * Autoloader class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Autoloader;

/**
 * Autoloader class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Autoloader
{
    /**
     * Loader list, array of \ShnfuCarver\Component\Loader\LoaderInterface
     *
     * @var array
     */
    private $_loaderList = array();

    /**
     * The main autoload
     *
     * @param  string $name
     * @return void
     */
    public function autoload($name)
    {
        foreach ($this->_loaderList as $loader)
        {
            if ($loader->load($name))
            {
                // only match the first successful load
                break;
            }
        }
    }

    /**
     * Register the autoloader
     *
     * @return bool
     */
    public function register()
    {
        return spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * Set the loader for autoload
     *
     * @param  array|\ShnfuCarver\Component\Loader\LoaderInterface $loader
     * @return void
     */
    public function setLoader($loader)
    {
        if (is_array($loader))
        {
            $tempList = $loader;
        }
        else
        {
            $tempList = array($loader);
        }

        foreach ($tempList as $tempLoader)
        {
            if (!$tempLoader instanceof \ShnfuCarver\Component\Loader\LoaderInterface)
            {
                throw new \InvalidArgumentException('The loader must be a \ShnfuCarver\Component\Loader\LoaderInterface instance!');
            }
        }

        $this->_loaderList = $tempList;
    }
}

?>
