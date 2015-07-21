<?php

use Direct\Valmod\ModelBuilder\Table;

class TableTest extends PHPUnit_Framework_TestCase
{
    protected $tableJson;

    protected function setUp()
    {
$this->tableJson = <<<JSON
{
    "tableName": "first_table",
    "displayName": "My First Table",
    "columns": [
        { "columnName": "col1", "dataType": "Integer" },
        { "columnName": "col2", "dataType": "String" }
    ]
}
JSON;
    }

    /** @test */
    public function it_has_table_name_with_prefix()
    {
        $table = new Table('tmp', $this->tableJson);
        $this->assertEquals("tmp_first_table", $table->getTableName());
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function it_throws_exception_on_empty_prefix()
    {
        $table = new Table('', $this->tableJson);
    }

    /** @test */
    public function it_has_two_columns()
    {
        $table = new Table('tmp', $this->tableJson);
        $this->assertEquals(2, $table->getColumnCount());
    }

    /** @test */
    public function it_can_create_table()
    {
        $table = new Table('tmp', $this->tableJson);
        $this->assertContains('CREATE TABLE tmp_first_table', $table->getTableDefinition());
    }
}
