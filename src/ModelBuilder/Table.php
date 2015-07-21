<?php

namespace Direct\Valmod\ModelBuilder;

class Table
{
    protected $tableName;
    protected $displayName;

    protected $columns;

    public function __construct($json)
    {
        // TODO: Get the table prefix

        // TODO: Hydrate the columns array
        $decodedJson = json_decode($json, true);

        $this->tableName = $decodedJson['tableName'];

        $this->columns = $decodedJson['columns'];

//        foreach($decodedJson['columns'] as $columns){
//            $this->columns[] = $columns['columnName'];
//        }

    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getColumnCount()
    {
        return count($this->columns);
    }

    public function getDDL()
    {
        // TODO:
        // beginTable + all columns + endTable
    }
}
