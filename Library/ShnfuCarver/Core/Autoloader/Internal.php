<?php

/**
 * Internal class file for autoload
 *
 * @package    ShnfuCarver
 * @subpackage Core\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Core\Autoloader;

/**
 * Internal class for autoload
 *
 * @package    ShnfuCarver
 * @subpackage Core\Autoloader
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Internal
{
    /**
     * The singleton traits
     */
    use \ShnfuCarver\Common\Singleton\Singleton;

    const LOAD_EXTENSION = '.php';

    private $_loadMap = array();

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
        return '\\' . ltrim(rtrim($name, '\\') . '\\', '\\');
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
     * Add an entry for the load map 
     *
     * If the specified entry exists, append the path to the array
     * Do not append the '.php' extension to the path,
     * because this may also be used for a directory.
     *
     * @param  string $name 
     * @param  string|array $path 
     * @return ShnfuCarver\Core\Autoloader\Internal
     */
    public function add($name, $path)
    {
        if (!is_string($path) && !is_array($path))
        {
            throw new \ShnfuCarver\Core\Exception\Base('The path must be a string or array!');
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
            $this->_loadMap[$name] = $paths;
        }

        return $this;
    }

    /**
     * Remove an entry for the load map 
     *
     * @param  string $name 
     * @return ShnfuCarver\Core\Autoloader\Internal
     */
    public function remove($name)
    {
        unset($this->_loadMap[$name]);

        return $this;
    }

    /**
     * Load the file with the class name
     *
     * Only load the first file matched
     *
     * @param  string $className 
     * @return bool
     */
    public function autoload($className)
    {
        // make sure the prefix start with a backslash
        $className = self::_formatClassName($className);
        $prefix = $className;
        $suffix = '';
        $loadFileOk = false;
        do
        {
            echo "prefix: $prefix  suffix: $suffix" . PHP_EOL;
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

            $lastNsPos = strrpos($prefix, '\\');
            if (false === $lastNsPos)
            {
                break;
            }
            $suffix = substr($className, $lastNsPos);
            $suffix = str_replace('\\', DIRECTORY_SEPARATOR, $suffix);
            $prefix = self::_formatClassName(substr($prefix, 0, $lastNsPos));
        } while (!empty($prefix));

        return $loadFileOk;
    }

    /**
     * Load the file with the prefix and suffix
     *
     * @param  string $prefix 
     * @param  string $suffix 
     * @return bool
     */
    private static function _loadFile($prefix, $suffix)
    {
        $filePath = $prefix . $suffix . self::LOAD_EXTENSION;
        if (is_file($filePath))
        {
            echo "load file: $filePath" . PHP_EOL;
            include_once $filePath;
            return true;
        }

        return false;
    }
}

?>
