<?php

use Direct\Valmod\ModelBuilder\Table;

class TableTest extends PHPUnit_Framework_TestCase
{
    protected $tableJson;
    protected $table;

    protected function setUp()
    {

$this->tableJson = <<<JSON
{
    "tableName": "first_table",
    "displayName": "My First Table",
    "columns": [
        { "columnName": "col1" },
        { "columnName": "col2" }
    ]
}
JSON;
        $this->table = new Table($this->tableJson);
    }

    /** @test */
    public function it_has_table_name()
    {
        $this->assertEquals("first_table", $this->table->getTableName());
    }

    /** @test */
    public function it_has_two_columns()
    {
        $this->assertEquals(2, $this->table->getColumnCount());
    }
} 