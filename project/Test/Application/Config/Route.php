<?php

$tempConfig['route']['action']['default']     = 'index';
$tempConfig['route']['action']['not_found']   = 'notFound';
$tempConfig['route']['controller']['default'] = 'Default';
$tempConfig['route']['controller']['not_found'] = '\ShnfuCarver\Controller\NotFound';

$tempConfig['route'][''][''] = '\ShnfuCarver\Controller\NotFoundController';

$tempConfig['route']['controller']['products/([a-z]+)/(\d+)'] = '$1/id_$2';

?>
