<?php

/**
 * Redirect response class file
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Response;

/**
 * Redirect response class
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Response
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class RedirectResponse extends Response
{
    /**
     * construct 
     *
     * @param  string $bodyContent
     * @param  int    $statusCode
     * @return void
     */
    public function __construct($uri, $statusCode = 301)
    {
        parent::__construct('', $statusCode);

        $this->addHeader(new Unit\Header\Header('Location', $uri));
    }
}

?>
