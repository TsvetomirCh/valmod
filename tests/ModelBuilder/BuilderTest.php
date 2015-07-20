<?php

use Direct\Valmod\ModelBuilder\Builder;

class BuilderTest extends PHPUnit_Framework_TestCase
{
    protected $modelJson;

<<<<<<< HEAD
    /**
     * @var Direct\Valmod\ModelBuilder\Builder
     */
=======
>>>>>>> origin/master
    protected $modelBuilder;

    protected function setUp()
    {
        // { "columnName": "", "dataType": "", "displayName": "", "description": "" },
$this->modelJson = <<<JSON
{
    "modelName": "Dummy Model",
    "prefix": "dummy",
    "tables": [
        {
            "tableName": "first_table",
            "displayName": "My First Table",
            "columns": [
                { "columnName": "col1", "dataType": "Integer", "displayName": "First Column", "description": "The Very First Column" },
                { "columnName": "strcol", "dataType": "String", "displayName": "String Column", "description": "No Description" }
            ]
        },
        {
        }
    ]
}
JSON;

        $this->modelBuilder = new Builder($this->modelJson);
    }

    /** @test */
    public function it_has_model_name()
    {
        $this->assertEquals("Dummy Model", $this->modelBuilder->getModelName());
    }

    /** @test */
    public function it_has_a_prefix()
    {
        $this->assertEquals("dummy", $this->modelBuilder->getPrefix());
    }

    /** @test */
    public function it_has_two_tables()
    {
        $this->assertEquals(2, $this->modelBuilder->getTableCount());
    }
} 