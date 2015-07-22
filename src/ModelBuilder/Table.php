<?php

namespace Direct\Valmod\ModelBuilder;

/**
 * TODO:
 * Table Key ?
 *  - table have array of column names defined as key
 *  - if the table does not have a key defined, then we add an id column
 *
 * Timestamps ?
 *  - always add internal column - created_at DateTime
 *
 * Datasource ?
 *  - where does the record comes from - filename/web service call
 */

class Table
{
    protected $tableName;
    protected $displayName;

    protected $columns;

    public function __construct($prefix, $json)
    {

        $decodedJson = json_decode($json, true);


        $this->tableName = $decodedJson['tableName'];

        if (!empty($prefix)) {

            $this->tableName = $prefix . "_" . $this->tableName;

        } else {

            throw new \InvalidArgumentException('Prefix is required!');

        }

        // TODO:
        // The Column constructor requires json
        // How can we prevent encoding to json again ?
        // Maybe support creating Columns via json string and array ?
        // Or the json will be decoded once in the Builder class, so Tables and Columns will be created via arrays.
        foreach ($decodedJson['columns'] as $columnJson ) {
            $this->columns[] = new Column(json_encode($columnJson));
        }
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getColumnCount()
    {
        return count($this->columns);
    }

    public function getTableDefinition()
    {
        $columnDefinitions = array_map( function (Column $col) {
            return $col->getColumnDefinition();
        }, $this->columns);

        $allColumns = implode(', ', $columnDefinitions);

        return "CREATE TABLE " . $this->getTableName() . " ( " . $allColumns . " );";
    }
}
