<?php

namespace Direct\Valmod\ModelBuilder;

/**
 * Types
 *  - Integer   -> INT UNSIGNED NULL
 *  - Float     -> DOUBLE(10,2) NULL
 *  - String    -> VARCHAR(255) NULL
 *  - Flag      -> TINYINT NULL
 *  - DateTime  -> TIMESTAMP NOT NULL DEFAULT "0000-00-00 00:00:00"
 *  - All fields nullable
 */

class Column
{
    protected $columnName;
    protected $dataType;
    protected $displayName;
    protected $description;

    public $dataTypes = ['Integer', 'Float', 'String', 'Flag', 'DateTime'];

    public function __construct($json)
    {

        $decodedJson = json_decode($json, true);

        if (isset($decodedJson['columnName'])) {

            if (!empty($decodedJson['columnName'])) {

                $this->columnName = $decodedJson['columnName'];

            } else {

                throw new \InvalidArgumentException('Column name can not be empty!');

            }

        } else {

            throw new \InvalidArgumentException('Column name is required!');

        }


        if (!empty($decodedJson['dataType'])) {

            if (in_array($decodedJson['dataType'], $this->dataTypes)) {

                $this->dataType = $decodedJson['dataType'];

            } else {

                throw new \InvalidArgumentException('Invalid data type!');
            }

        } else {

            throw new \InvalidArgumentException('Data type can not be empty');
        }



        if (!empty($decodedJson['displayName'])) {

            $this->displayName = $decodedJson['displayName'];

        }

        if (!empty($decodedJson['description'])) {

            $this->description = $decodedJson['description'];

        }

    }

    public function getColumnName()
    {
        return $this->columnName;
    }

    public function getDataType()
    {
        return $this->dataType;
    }

    public function getColumnDefinition()
    {
        switch ($this->dataType) {
            case 'Integer':
                return $this->createInteger();
                break;
            case 'String':
                return $this->createString();
                break;
            case 'Float':
                return $this->createFloat();
                break;
            case 'Flag':
                return $this->createFlag();
                break;
            case 'DateTime':
                return $this->createDate();
                break;
            }
    }

    private function createInteger()
    {
        return $this->getColumnName(). " " . 'INT UNSIGNED NULL';
    }

    private function createString()
    {
        return $this->getColumnName(). " " . "VARCHAR(255) NULL";
    }

    private function createFloat()
    {
        return $this->getColumnName(). " " . "DOUBLE(10,2) NULL";
    }

    private function createFlag()
    {
        return $this->getColumnName(). " " . "TINYINT NULL";
    }

    private function createDate()
    {
        return $this->getColumnName(). " " . 'TIMESTAMP NOT NULL DEFAULT "0000-00-00 00:00:00"';
    }
}
