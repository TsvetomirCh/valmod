<?php


use Direct\Valmod\ModelBuilder\Column;

class ColumnTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_requires_column_name_and_datatype()
    {
$json = <<<JSON
{ "columnName": "col1", "dataType": "Integer", "displayName": "First Column", "description": "The Very First Column" }
JSON;
        $col = new Column($json);
        $this->assertEquals("col1", $col->getColumnName());
        $this->assertEquals("Integer", $col->getDataType());
    }

    /** @test */
    public function it_can_create_integer_column()
    {
$json = <<<JSON
{ "columnName": "col_int", "dataType": "Integer", "displayName": "First Column", "description": "The Very First Column" }
JSON;
        $col = new Column($json);
        $this->assertEquals("col_int INTEGER", $col->getDDL());
} 