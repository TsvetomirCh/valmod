<?php

namespace Direct\Valmod\ModelBuilder;

/**
 * - Load model definition from json
 * - Generate DDL for all tables
 *
 */
class Builder
{
    // TODO: array of tables
    protected $tables;

    public function __construct($json)
    {
        // TODO: load the json and hydrate the array of tables - loop the tables, create new Table Object, add it the array
    }

    public function getModelName()
    {
        // TODO: Actually return the model name
        return "Dummy Model";
    }

    public function getPrefix()
    {
        // TODO: Actually return the prefix
        return "dummy";
    }

    public function getTableCount()
    {
        // TODO: Actually return the table count
        return 2;
    }
<<<<<<< HEAD

    public function getDDL()
    {
        // return DDL for all tables in the model
    }
}
=======
} 
>>>>>>> origin/master
