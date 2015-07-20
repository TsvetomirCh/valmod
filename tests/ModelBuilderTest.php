<?php

use Direct\Valmod\ModelBuilder;

class ModelBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testDummy()
    {
        $mb = new ModelBuilder;
        $this->assertFalse($mb->dummy());
    }
}