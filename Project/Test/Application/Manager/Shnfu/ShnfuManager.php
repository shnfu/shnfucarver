<?php

namespace Shnfu;

class ShnfuManager extends \ShnfuCarver\Manager\Manager
{
    public function init()
    {
        parent::init();
    }

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
        $this->_getService('config')->loadAppend(__DIR__ . '/Config/Config.php');

        parent::loadConfig();
    }
}

?>
