<?php

namespace Direct\Valmod\ModelBuilder;

class Builder
{
    protected $modelName;

    protected $prefix;

    protected $tables;

    public function __construct($json)
    {
        $decodedJson = json_decode($json, true);

        $this->modelName = $decodedJson['modelName'];

        $this->prefix = $decodedJson['prefix'];

        foreach ($decodedJson['tables'] as $table ) {
            $this->tables[] = new Table($this->prefix, json_encode($table));
        }

    }

    public function getModelName()
    {
        return $this->modelName;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function getTableCount()
    {
        return count($this->tables);
    }

    public function getModelDefinition()
    {
        $result = '';

        foreach ($this->tables as $table) {
            $result .= $table->getTableDefinition();
        }

        return $result;
    }
}

