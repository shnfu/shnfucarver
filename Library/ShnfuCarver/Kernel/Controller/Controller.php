<?php

/**
 * Controller class file
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Kernel\Controller;

/**
 * Controller class
 *
 * @package    ShnfuCarver
 * @subpackage Kernel\Controller
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Controller implements ControllerInterface
{
    /**
     * Name
     *
     * @var string
     */
    protected $_name;

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

        $this->_name = \ShnfuCarver\Kernel\Misc\Name::extractName(get_class($this), 'Controller');

        return $this->_name;
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
}

?>
