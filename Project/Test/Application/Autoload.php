<?php

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

defined('SHNFUCARVER_PATH')
    || define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));

class Autoload
{
    private static $_loadPath = array();

    private static function _config()
    {
        self::$_loadPath = array
        (
            '' => array
            (
                SHNFUCARVER_PATH,
                APPLICATION_PATH . '/Application/Manager',
            ),
        );
    }

    public static function register()
    {
        self::_config();

        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Autoloader/Autoloader.php';
        $autoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

        require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/StandardLoader.php';
        $loader = new \ShnfuCarver\Component\Loader\StandardLoader;

        $loader->add(self::$_loadPath);

        $autoloader->setLoader($loader);
        $autoloader->register();
    }
}

?>
