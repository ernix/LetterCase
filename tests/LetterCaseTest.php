<?php

namespace LetterCase\Test;

require_once __DIR__ . '/../src/LetterCase.php';

use LetterCase as LC;

class LetterCaseTest extends \PHPUnit_Framework_TestCase
{
    public function testSnakeCase()
    {
        $this->assertEquals(LC\snake("PascalCase"), 'pascal_case');
        $this->assertEquals(LC\snake("Path/To/File"), 'path_to_file');
        $this->assertEquals(LC\snake("camelCase"), 'camel_case');
        $this->assertEquals(LC\snake("snake_case"), 'snake_case');
        $this->assertEquals(LC\snake("UPPERCase"), 'upper_case');
        $this->assertEquals(LC\snake("lasT"), 'las_t');
    }

    public function testPascalCase()
    {
        $this->assertEquals(LC\pascal("PascalCase"), 'PascalCase');
        $this->assertEquals(LC\pascal("Path/To/File"), 'PathToFile');
        $this->assertEquals(LC\pascal("camelCase"), 'CamelCase');
        $this->assertEquals(LC\pascal("snake_case"), 'SnakeCase');
        $this->assertEquals(LC\pascal("UPPERCase"), 'UPPERCase');
        $this->assertEquals(LC\pascal("lasT"), 'LasT');
    }

    public function testCamelCase()
    {
        $this->assertEquals(LC\camel("PascalCase"), 'pascalCase');
        $this->assertEquals(LC\camel("Path/To/File"), 'pathToFile');
        $this->assertEquals(LC\camel("camelCase"), 'camelCase');
        $this->assertEquals(LC\camel("snake_case"), 'snakeCase');
        $this->assertEquals(LC\camel("UPPERCase"), 'upperCase');
        $this->assertEquals(LC\camel("lasT"), 'lasT');
    }

    public function testPathForm()
    {
        $this->assertEquals(LC\path("PascalCase"), 'Pascal/Case');
        $this->assertEquals(LC\path("Path/To/File"), 'Path/To/File');
        $this->assertEquals(LC\path("camelCase"), 'camel/Case');
        $this->assertEquals(LC\path("snake_case"), 'snake/case');
        $this->assertEquals(LC\path("UPPERCase"), 'UPPER/Case');
        $this->assertEquals(LC\path("lasT"), 'las/T');
    }
}
