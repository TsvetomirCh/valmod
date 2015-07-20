<?php

namespace Direct\Valmod\ModelBuilder;

class Table
{
    protected $tableName;
    protected $displayName;

    protected $columns;

    public function __construct($json)
    {
        // TODO: should receive part of the json, only for one table
        // TODO: Hydrate the columns array
    }

    public function getTableName()
    {
        // TODO: Actually return the table name
        return "first_table";
    }

    public function getColumnCount()
    {
        // TODO: Actually return the column count
        return 2;
    }


    public function getDDL()
    {
        // beginTable + all columns + endTable
    }
}
