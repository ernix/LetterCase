<?php
/**
 * LetterCase switcher
 * 
 * PHP version 5.4
 *
 * @category String
 * @package  LetterCase
 * @author   Shin Kojima <shin@kojima.org>
 * @license  MIT License
 * @link     http://github.com/ernix/
 */

namespace LetterCase;

function snake($str)
{
    return (new LetterCase($str))->snake();
}

function pascal($str)
{
    return (new LetterCase($str))->pascal();
}

function camel($str)
{
    return (new LetterCase($str))->camel();
}

function path($str)
{
    return (new LetterCase($str))->path();
}

/**
 * LetterCaseException class
 *
 * @category Exception
 * @package  LetterCase
 * @author   Shin Kojima <shin@kojima.org>
 * @license  MIT License
 * @link     http://github.com/ernix/
 */
class LetterCaseException extends \Exception
{
}

/**
 * LetterCase class
 *
 * @category String
 * @package  LetterCase
 * @author   Shin Kojima <shin@kojima.org>
 * @license  MIT License
 * @link     http://github.com/ernix/
 */
class LetterCase
{
    private $_parts = [];

    /**
     * constructor
     *
     * @param string $str Input string.
     */
    function __construct($str)
    {
        if (!is_string($str)) {
            throw new LetterCaseException("parameter must be a string.");
        }

        return $this->_parse($str);
    }

    /**
     * Parse input string.
     *
     * @param string $str Input string.
     *
     * @return LetterCase object
     */
    private function _parse($str)
    {
        $str = trim($str);

        // path form
        if (strpos($str, '/') !== false) {
            $this->_parts = preg_split('/\//', $str);
            return $this;
        }

        // snake case
        if (strpos($str, '_') !== false) {
            $this->_parts = preg_split('/_/', $str);
            return $this;
        }

        // camel/pascal case
        $this->_parts = preg_split('/(?<=.)(?=[A-Z]([^A-Z]|$))/', $str);
        return $this;
    }

    /**
     * Return pascal case
     *
     * @return string PascalCase
     */
    function pascal()
    {
        $parts = array_map(
            function ($part) {
                return ucfirst($part);
            },
            $this->_parts
        );
        return join('', $parts);
    }

    /**
     * Return snake case
     *
     * @return string snake_case
     */
    function snake()
    {
        $parts = array_map(
            function ($part) {
                return strtolower($part);
            },
            $this->_parts
        );
        return join('_', $parts);
    }

    /**
     * Return camel case
     *
     * @return string camelCase
     */
    function camel()
    {
        $first_part = array_shift($this->_parts);
        return strtolower($first_part) . $this->pascal();
    }

    /**
     * Return path form
     *
     * @return string Path/Form
     */
    function path()
    {
        return join('/', $this->_parts);
    }
}
