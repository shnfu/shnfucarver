<?php

$tempConfig = array();

include CONFIGURATION_PATH . '/Autoloader.php';

include CONFIGURATION_PATH . '/Error.php';

include CONFIGURATION_PATH . '/Exception.php';

$tempConfig['test'] = 'OK';

return $tempConfig;

?>
