<?php

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testBasic()
    {
        $this->assertTrue(true);
    }

    public function testAddition()
    {
        $this->assertEquals(10, 9+1);
    }
}

