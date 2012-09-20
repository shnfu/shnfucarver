<?php

/**
 * Class file for rule
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rule
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */

namespace ShnfuCarver\Component\Dispatcher\Router\Rule;

/**
 * Class for rule
 * TODO: think about the description of generator
 *
 * @package    ShnfuCarver
 * @subpackage Component\Dispatcher\Router\Rule
 * @copyright  2012 Shnfu
 * @author     Zhao Xianghu <xianghuzhao@gmail.com>
 * @license    http://carver.shnfu.com/license.txt    New BSD License
 */
class Rule
{
    /**
     * The pattern
     *
     * @var array
     */
    private $_pattern = array();

    /**
     * The replace
     *
     * @var array
     */
    private $_replace = array();

    /**
     * The generator pattern
     *
     * @var array
     */
    private $_generatorPattern = array();

    /**
     * The generator replace
     *
     * @var array
     */
    private $_generatorReplace = array();

    /**
     * The parameter separator
     *
     * @var string
     */
    private $_parameterSeparator = '-';

    /**
     * construct
     *
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Rewrite\RewriterInterface $rewriter
     * @param  \ShnfuCarver\Component\Dispatcher\Router\Parser\ParserInterface    $parser
     * @return void
     */
    public function __construct(array $pattern = array(), $replace = array(), $generator = '', $separator = '-')
    {
        if (empty($generator))
        {
            $this->_generator = '/{:controller}.{:action}-{:parameters}';
        }
        $this->_rewriter = $rewriter;
        $this->_parser   = $parser;
    }

    /**
     * Get the path info
     *
     * @return string
     */
    public function generatePathInfo()
    {
        return $this->_controllerName;
    }

    /**
     * Get the patterns
     *
     * @return array
     */
    public function getPattern()
    {
        return $this->_pattern;
    }

    /**
     * Get the replaces
     *
     * @return array
     */
    public function getReplace()
    {
        return $this->_replace;
    }
}

?>
