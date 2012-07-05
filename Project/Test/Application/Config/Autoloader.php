<?php

$tempConfig['autoloader']['use_internal_loader'] = true;

$tempConfig['autoloader']['internal_loader'] = array
(
    '\ShnfuCarver' => array('', ''),
    '\Test' => '',
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
