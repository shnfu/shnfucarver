<?php

/**
 * Callback batch class file
 *
 * @package    ShnfuCarver
 * @subpackage Common\Callback
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Common\Callback;

/**
 * Callback batch class
 *
 * @package    ShnfuCarver
 * @subpackage Common\Callback
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com> 
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Batch
{
    /**
     * Callback list 
     *
     * @var array
     */
    protected $_callbackList = array();

    /**
     * Call all functions in the list 
     * 
     * @param  array $paramArray 
     * @param  bool  $matchOnce  If this is true, break immediately after the first successful call
     * @return void
     */
    public function callList($paramArray, $matchOnce = false)
    {
        $callSuccessfully = false;
        foreach ($this->_callbackList as $callback)
        {
            if (is_string($callback) || is_array($callback))
            {
                if (call_user_func_array($callback, $paramArray))
                {
                    $callSuccessfully = true;
                    if ($matchOnce)
                    {
                        break;
                    }
                }
            }
        }

        return $callSuccessfully;
    }

    /**
     * Append a new callback
     *
     * @param  string|array $callback 
     * @return ShnfuCarver\Common\Callback\Batch
     */
    public function append($callback)
    {
        $this->_callbackList[] = $callback;

        return $this;
    }

    /**
     * Remove an existing callback
     *
     * @param  string|array $callback 
     * @return bool|ShnfuCarver\Common\Callback\Batch  Return false if does not exist
     */
    public function remove($callback)
    {
        if (false !== ($index = array_search($callback, $this->_callbackList, true)))
        {
            unset($this->_callbackList[$index]);
        }

        return $this;
    }
}

?>
