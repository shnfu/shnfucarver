<?php

define('APPLICATION_PATH', realpath(__DIR__ . '/..'));

define('SHNFUCARVER_PATH', realpath(APPLICATION_PATH . '/../../Library'));
define('CONFIGURATION_PATH', realpath(APPLICATION_PATH . '/Application/Config'));

// autoloader
require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Autoloader/Autoloader.php';
$frameworkAutoloader = new \ShnfuCarver\Component\Autoloader\Autoloader;

require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/LoaderInterface.php';
require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/NameIterator.php';
require_once SHNFUCARVER_PATH . '/ShnfuCarver/Component/Loader/InternalLoader.php';
$loader = new \ShnfuCarver\Component\Loader\InternalLoader;
$loader->add('', SHNFUCARVER_PATH);

$frameworkAutoloader->setLoader($loader);
$frameworkAutoloader->register();


date_default_timezone_set('Asia/Shanghai');


// app manager
$appManager = new \ShnfuCarver\Manager\App\AppManager();
$appManager->addSubManager(
    array
    (
        new \ShnfuCarver\Manager\Autoloader\AutoloaderManager,
        new \ShnfuCarver\Manager\Error\ErrorManager,
        new \ShnfuCarver\Manager\Exception\ExceptionManager,
        //new \ShnfuCarver\Manager\Dispatcher\DispatcherManager,
    )
);
$appManager->setConfigPath(CONFIGURATION_PATH . '/Config.php');
$appManager->run();

?>
