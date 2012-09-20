<?php

$tempConfig['autoloader']['use_standard_loader'] = true;

$tempConfig['autoloader']['standard_loader'] = array
(
//    '\ShnfuCarver' => array('', ''),
//    '\Test' => APPLICATION_PATH . '/Application/Manager/Test',
);

// TODO: redesign this later
// Need to config the custom loader
// Maybe add a config method for every loader
// and invoke that in the manager
$tempConfig['autoloader']['loader'] = array
(
    '\CustomLoader',
    '\Test\NewLoader',
);

?>
