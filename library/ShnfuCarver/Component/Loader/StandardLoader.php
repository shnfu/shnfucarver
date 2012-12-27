<?php

/**
 * Standard loader class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Loader;

require_once __DIR__ . '/LoaderInterface.php';
require_once __DIR__ . '/NameIterator.php';

/**
 * Standard loader class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class StandardLoader implements LoaderInterface
{
    const LOAD_EXTENSION = '.php';

    /**
     * The load map
     *
     * @var array
     */
    private $_loadMap = array();

    /**
     * The order when split the namespace
     * true means from right to left and false for left to right
     *
     * @var bool
     */
    private $_reverse = false;

    /**
     * construct
     *
     * @param  bool $reverse
     * @return void
     */
    public function __construct($reverse = false)
    {
        $this->_reverse = $reverse;
    }

    /**
     * Set the reverse
     *
     * @param  bool $reverse
     * @return void
     */
    public function setReverse($reverse = true)
    {
        $this->_reverse = $reverse;
    }

    /**
     * Add an entry for the load map
     *
     * If the specified entry exists, append the path to the array
     * Do not append the '.php' extension to the path,
     * because this may also be used for a directory.
     *
     * @param  array $loadMap
     * @return ShnfuCarver\Component\Loader\StandardLoader
     */
    public function add(array $loadMap)
    {
        foreach ($loadMap as $name => $path)
        {
            $name = self::_formatClassName($name);
            $path = (array)$path;
            $tempPath = array();
            foreach ($path as $onePath)
            {
                $tempPath[] = self::_formatPathName($onePath);
            }
            $this->_loadMap = array_merge_recursive($this->_loadMap, array($name => $tempPath));
        }

        return $this;
    }

    /**
     * Remove an entry for the load map
     *
     * @param  string $name
     * @return ShnfuCarver\Component\Loader\StandardLoader
     */
    public function remove($name)
    {
        $name = self::_formatClassName($name);
        unset($this->_loadMap[$name]);

        return $this;
    }

    /**
     * Load the file with the name
     *
     * Only load the first file matched
     *
     * @param  string $name
     * @return bool
     */
    public function load($name)
    {
        $nameIter = new NameIterator(self::_formatClassName($name), $this->_reverse);

        $loadFileOk = false;
        foreach ($nameIter as $prefix => $suffix)
        {
            if (isset($this->_loadMap[$prefix]))
            {
                $paths = $this->_loadMap[$prefix];

                foreach ($paths as $path)
                {
                    if (self::_loadFile($path, $suffix))
                    {
                        $loadFileOk = true;
                        break;
                    }
                }
                if ($loadFileOk)
                {
                    break;
                }
            }
        }

        return $loadFileOk;
    }

    /**
     * Format the class name to a specified form
     *
     * The name should start with a '\' and end without '\'
     *
     * @param  string $name
     * @return string
     */
    private static function _formatClassName($name)
    {
        $trimName = ltrim(rtrim($name, '\\'), '\\');
        if (!empty($trimName))
        {
            $trimName = '\\' . $trimName;
        }
        return $trimName;
    }

    /**
     * Format the path name to a specified form
     *
     * The name should end without '\'
     *
     * @param  string $name
     * @return string
     */
    private static function _formatPathName($name)
    {
        $name = str_replace('\\', DIRECTORY_SEPARATOR, $name);
        $name = str_replace('/', DIRECTORY_SEPARATOR, $name);
        $name = rtrim($name, DIRECTORY_SEPARATOR);

        // Strip the extension
        if (substr($name, -strlen(self::LOAD_EXTENSION)) == self::LOAD_EXTENSION)
        {
            $name = substr($name, 0, -strlen(self::LOAD_EXTENSION));
        }

        return $name;
    }

    /**
     * Load the file with the prefix and suffix
     *
     * @param  string $prefix
     * @param  string $suffix
     * @return bool
     */
    private static function _loadFile($path, $suffix)
    {
        $suffix = str_replace('\\', DIRECTORY_SEPARATOR, $suffix);
        $filePath = $path . $suffix . self::LOAD_EXTENSION;

        if (is_file($filePath))
        {
            include_once $filePath;
            return true;
        }

        return false;
    }
}

?>
