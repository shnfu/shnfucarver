<?php

/**
 * Manager class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Manager;

/**
 * Manager class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Manager
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
abstract class Manager implements ManagerInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

    /**
     * Sub manager
     * Array of \ShnfuCarver\Kernel\Manager\Manager
     *
     * @var array
     */
    protected $_subManager = array();

    /**
     * Config
     *
     * @var array
     */
    protected $_config = array();

    /**
     * Service repository
     *
     * @var \ShnfuCarver\Kernel\Service\ServiceRepository
     */
    protected $_serviceRepository;

    /**
     * Get name from the class name
     *
     * @return string
     */
    public function getName()
    {
        if (!empty($this->_name))
        {
            return $this->_name;
        }

        $this->_name = \ShnfuCarver\Kernel\Misc\Name::extractName(get_class($this), 'Manager');

        return $this->_name;
    }

    /**
     * Add sub manager
     *
     * @param  array|\ShnfuCarver\Kernel\Manager\Manager $subManager
     * @return void
     */
    public function addSubManager($subManager)
    {
        if ($subManager instanceof \ShnfuCarver\Kernel\Manager\Manager)
        {
            $subManager->setServiceRepository($this->_serviceRepository);
            $this->_subManager[] = $subManager;
        }
        else if (is_array($subManager))
        {
            foreach ($subManager as $oneSubManager)
            {
                $oneSubManager->setServiceRepository($this->_serviceRepository);
                $this->_subManager[] = $oneSubManager;
            }
        }
        else
        {
            throw new \InvalidArgumentException('subManager must be an array or instance of \ShnfuCarver\Kernel\Manager\Manager!');
        }
    }

    /**
     * Run
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->run();
        }
    }

    /**
     * Initialization
     *
     * @return void
     */
    public function init()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->init();
        }
    }

    /**
     * Clean
     *
     * @return void
     */
    public function clean()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->clean();
        }
    }

    /**
     * Set service repository
     *
     * @param  \ShnfuCarver\Kernel\Service\ServiceRepository|null $serviceRepository
     * @return void
     */
    public function setServiceRepository($serviceRepository)
    {
        if (!$serviceRepository instanceof \ShnfuCarver\Kernel\Service\ServiceRepository)
        {
            $serviceRepository = null;
        }

        $this->_serviceRepository = $serviceRepository;
        foreach ($this->_subManager as $subManager)
        {
            $subManager->setServiceRepository($serviceRepository);
        }
    }

    /**
     * Load config
     *
     * @return void
     */
    public function loadConfig()
    {
        foreach ($this->_subManager as $subManager)
        {
            $subManager->loadConfig();
        }
    }

    /**
     * Get config
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Get a service
     *
     * @param  string $name
     * @return \ShnfuCarver\Kernel\Service\ServiceInterface $service
     */
    protected function _get($name)
    {
        if (!$this->_serviceRepository instanceof \ShnfuCarver\Kernel\Service\ServiceRepository)
        {
            throw new \RuntimeException('The service repository is not set properly!');
        }

        return $this->_serviceRepository->get($name);
    }

    /**
     * Does a service exist
     *
     * @param  string $name
     * @return bool
     */
    protected function _existService($name)
    {
        if (!$this->_serviceRepository instanceof \ShnfuCarver\Kernel\Service\ServiceRepository)
        {
            throw new \RuntimeException('The service repository is not set properly!');
        }

        return $this->_serviceRepository->exist($name);
    }

    /**
     * Register a service
     *
     * @param  \ShnfuCarver\Kernel\Service\Service $service
     * @return \ShnfuCarver\Kernel\Service\Service
     */
    protected function _registerService($service)
    {
        if (!$this->_serviceRepository instanceof \ShnfuCarver\Kernel\Service\ServiceRepository)
        {
            throw new \RuntimeException('The service repository is not set properly!');
        }

        return $this->_serviceRepository->register($service);
    }
}

?>
