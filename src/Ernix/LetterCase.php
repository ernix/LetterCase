<?php namespace Ernix;

/**
 * LetterCase class
 *
 * This class attempts to invoke a method on LetterCase\LetterCase subclass.
 *
 * @category String
 * @package  LetterCase
 * @author   Shin Kojima <shin@kojima.org>
 * @license  MIT License
 * @link     http://github.com/ernix/
 *
 * @method static camel
 * @method static pascal
 * @method static path
 * @method static snake
 */
class LetterCase
{
    public static function __callStatic($method, $arg)
    {
        $fqns = __NAMESPACE__ . '\LetterCase\LetterCase';
        $class = new \ReflectionClass($fqns);
        $lc = $class->newInstanceArgs($arg);

        try {
            return (string) $lc->$method();
        } catch (\Exception $e) {
            throw new Lettercase\LettercaseException($e->getMessage());
        }
    }
}
