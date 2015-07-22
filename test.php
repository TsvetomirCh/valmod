<?php

require 'vendor/autoload.php';

use Direct\Valmod\ModelBuilder\Builder;

$json = <<<JSON
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
        },{
            "tableName": "second_table",
            "displayName": "My second Table",
            "columns": [
                { "columnName": "col1", "dataType": "Integer", "displayName": "First Column", "description": "The Very First Column" },
                { "columnName": "strcol", "dataType": "String", "displayName": "String Column", "description": "No Description" }
            ]
        }
    ]
}
JSON;

$builder = new Builder($json);


echo $builder->getModelDefinition();