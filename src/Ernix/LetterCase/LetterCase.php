<?php namespace Ernix\LetterCase;

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
    protected $parts = array();
    protected $sep = '';

    /**
     * Constructor
     *
     * @param  string $str Input string.
     * @return LetterCase object
     */
    public function __construct($str)
    {
        if (!is_string($str)) {
            $e = "The 1st parameter must be a string.";
            throw new LetterCaseException($e);
        }

        return $this->parse($str);
    }

    /**
     * Put all the parts together.
     *
     * @return string
     */
    public function __toString()
    {
        return join($this->sep, $this->parts);
    }

    /**
     * Parse input string.
     *
     * XXX: Ambiguous Parsing Rule
     *  Some input strings are not enough clear to determine which `case` they
     *  were.  The current parsing rule is completely rely on my personal
     *  sense and it might be reasonable to give extra arguments so that users
     *  can tweak this method.
     *
     * @param string $str Input string.
     *
     * @return LetterCase object
     */
    protected function parse($str)
    {
        $str = trim($str);

        // path form
        if (strpos($str, '/') !== false) {
            $this->parts = preg_split('/\//', $str);
            $this->sep = '/';
            return $this;
        }

        // snake case
        if (strpos($str, '_') !== false) {
            $this->parts = preg_split('/_/', $str);
            $this->sep = '_';
            return $this;
        }

        // camel/pascal case
        $regexp = '/(?<=.)(?=[A-Z]([^A-Z]|$))/';
        $this->parts = preg_split($regexp, $str);
        $this->sep = '';
        return $this;
    }

    /**
     * PascalCase
     *
     * @return PascalCase object
     */
    public function pascal()
    {
        $this->parts = array_map(
            function ($part) {
                return ucfirst($part);
            },
            $this->parts
        );
        $this->sep = '';
        return $this;
    }

    /**
     * snake_case
     *
     * @return snake_case object
     */
    public function snake()
    {
        $this->parts = array_map(
            function ($part) {
                return strtolower($part);
            },
            $this->parts
        );
        $this->sep = '_';
        return $this;
    }

    /**
     * camelCase
     *
     * @return camelCase object
     */
    public function camel()
    {
        $first_part = array_shift($this->parts);
        $that = $this->pascal();
        array_unshift($that->parts, strtolower($first_part));
        return $that;
    }

    /**
     * Path/Form
     *
     * XXX: DIRECTORY_SEPARATOR is Platform Independent
     *
     * @return Path/Form object
     */
    public function path()
    {
        $this->sep = '/';
        return $this;
    }
}
