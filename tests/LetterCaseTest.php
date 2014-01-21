<?php

use \Ernix\LetterCase;

class LetterCaseTest extends \PHPUnit_Framework_TestCase
{
    public function testSnakeCase()
    {
        $this->assertEquals(LetterCase::snake("PascalCase"), 'pascal_case');
        $this->assertEquals(LetterCase::snake("Path/To/File"), 'path_to_file');
        $this->assertEquals(LetterCase::snake("camelCase"), 'camel_case');
        $this->assertEquals(LetterCase::snake("snake_case"), 'snake_case');
        $this->assertEquals(LetterCase::snake("UPPERCase"), 'upper_case');
        $this->assertEquals(LetterCase::snake("lasT"), 'las_t');
    }

    public function testPascalCase()
    {
        $this->assertEquals(LetterCase::pascal("PascalCase"), 'PascalCase');
        $this->assertEquals(LetterCase::pascal("Path/To/File"), 'PathToFile');
        $this->assertEquals(LetterCase::pascal("camelCase"), 'CamelCase');
        $this->assertEquals(LetterCase::pascal("snake_case"), 'SnakeCase');
        $this->assertEquals(LetterCase::pascal("UPPERCase"), 'UPPERCase');
        $this->assertEquals(LetterCase::pascal("lasT"), 'LasT');
    }

    public function testCamelCase()
    {
        $this->assertEquals(LetterCase::camel("PascalCase"), 'pascalCase');
        $this->assertEquals(LetterCase::camel("Path/To/File"), 'pathToFile');
        $this->assertEquals(LetterCase::camel("camelCase"), 'camelCase');
        $this->assertEquals(LetterCase::camel("snake_case"), 'snakeCase');
        $this->assertEquals(LetterCase::camel("UPPERCase"), 'upperCase');
        $this->assertEquals(LetterCase::camel("lasT"), 'lasT');
    }

    public function testPathForm()
    {
        $this->assertEquals(LetterCase::path("PascalCase"), 'Pascal/Case');
        $this->assertEquals(LetterCase::path("Path/To/File"), 'Path/To/File');
        $this->assertEquals(LetterCase::path("camelCase"), 'camel/Case');
        $this->assertEquals(LetterCase::path("snake_case"), 'snake/case');
        $this->assertEquals(LetterCase::path("UPPERCase"), 'UPPER/Case');
        $this->assertEquals(LetterCase::path("lasT"), 'las/T');
    }

    public function testUSAGE()
    {
        $snake_case = LetterCase::snake('LetterCase');
        $camelCase  = LetterCase::camel('LetterCase');
        $PascalCase = LetterCase::pascal('LetterCase');
        $path_form  = LetterCase::path('LetterCase');

        $this->assertEquals($snake_case, 'letter_case');
        $this->assertEquals($camelCase, 'letterCase');
        $this->assertEquals($PascalCase, 'LetterCase');
        $this->assertEquals($path_form, 'Letter/Case');

        $this->assertEquals(LetterCase::pascal($snake_case), 'LetterCase');
        $this->assertEquals(LetterCase::pascal($camelCase), 'LetterCase');
        $this->assertEquals(LetterCase::pascal($PascalCase), 'LetterCase');
        $this->assertEquals(LetterCase::pascal($path_form), 'LetterCase');
    }
}
