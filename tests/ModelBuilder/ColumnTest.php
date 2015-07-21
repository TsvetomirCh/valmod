<?php

use Direct\Valmod\ModelBuilder\Column;

class ColumnTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_requires_column_name_and_datatype()
    {
        $col = new Column('{ "columnName": "col1", "dataType": "Integer", "displayName": "First Column", "description": "The Very First Column" }');
        $this->assertEquals("col1", $col->getColumnName());
        $this->assertEquals("Integer", $col->getDataType());
    }

    /**
     * @test
     *
     * @expectedException InvalidArgumentException
     */
    public function it_throws_exception_if_no_column_name()
    {
        $col = new Column('{"dataType": "String"}');
    }

    /** @test */
    public function it_can_create_integer_column()
    {
        $col = new Column('{ "columnName": "col_int", "dataType": "Integer" }');
        $this->assertEquals("col_int INT UNSIGNED NULL", $col->getColumnDefinition());
    }

    /** @test */
    public function it_can_create_string_column()
    {
        $col = new Column('{ "columnName": "col_str", "dataType": "String" }');
        $this->assertEquals("col_str VARCHAR(255) NULL", $col->getColumnDefinition());
    }

    /** @test */
    public function it_can_create_float_column()
    {
        $col = new Column('{ "columnName": "col_str", "dataType": "Float" }');
        $this->assertEquals("col_str DOUBLE(10,2) NULL", $col->getColumnDefinition());
    }

    /** @test */
    public function it_can_create_flag_column()
    {
        $col = new Column('{ "columnName": "col_str", "dataType": "Flag" }');
        $this->assertEquals('col_str TINYINT NULL', $col->getColumnDefinition());
    }

    /** @test */
    public function it_can_create_date_column()
    {
        $col = new Column('{ "columnName": "col_str", "dataType": "DateTime" }');
        $this->assertEquals('col_str TIMESTAMP NOT NULL DEFAULT "0000-00-00 00:00:00"', $col->getColumnDefinition());
    }
}
