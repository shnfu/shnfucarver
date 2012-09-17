<?php

/**
 * Internal loader class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Loader;

/**
 * Internal loader class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Loader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class InternalLoader implements LoaderInterface
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
     * @param  string $name
     * @param  string|array $path
     * @return ShnfuCarver\Component\Loader\Internal
     */
    public function add($name, $path)
    {
        if (!is_string($path) && !is_array($path))
        {
            throw new \InvalidArgumentException('The path must be a string or array!');
        }

        $name = self::_formatClassName($name);

        $paths = (array)$path;
        foreach ($paths as &$value)
        {
            $value = self::_formatPathName($value);
        }

        if (isset($this->_loadMap[$name]))
        {
            // append to the existing one
            $tempPath = array_merge($this->_loadMap[$name], $paths);

            $this->_loadMap[$name] = $tempPath;
        }
        else
        {
            // create a new one
            $this->_loadMap[$name] = $paths;
        }

        return $this;
    }

    /**
     * Remove an entry for the load map
     *
     * @param  string $name
     * @return ShnfuCarver\Component\Loader\Internal
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
        $name = rtrim($name, self::LOAD_EXTENSION);
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
