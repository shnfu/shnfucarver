<?php

/**
 * Class file for request service
 *
 * @package    ShnfuCarver
 * @subpackage Service\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Service\Request;

/**
 * Request service class
 *
 * @package    ShnfuCarver
 * @subpackage Service\Request
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RequestService extends \ShnfuCarver\Kernel\Service\Service
{
    /**
     * Request
     *
     * @var Request
     */
    protected $_request;

    /**
     * Retrieve pathinfo
     *
     * @return string
     */
    public function getPathInfo()
    {
        return $this->_request->getPathInfo();
    }
}

?>
