<?php

namespace Direct\Valmod\ModelBuilder;

/**
 * Types
 *  - Integer
 *  - BigInteger
 *  - Float + precision? or always fixed precision
 *  - String - always 255 length
 *  - Flag - 0/1 Y/N CHAR(1)
 *  - DateTime - the time is optional
 */

class Column
{
<<<<<<< HEAD
    protected $columnName;
    protected $dataType;
    protected $displayName;
    protected $description;

    public function __construct($json)
    {
        // TODO: decode json and fill the properties
    }

    public function getColumnName()
    {
        // TODO:
        return "col1";
    }

    public function getDataType()
    {
        // TODO:
        return "Integer";
    }

    public function getDDL()
    {
        // switch $dataType, call createInteger, createString, etc...
        // return DDL String
    }

}
=======

} 
>>>>>>> origin/master
