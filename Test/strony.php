<?php

use PHPUnit\Framework\TestCase;

class Test extends PHPUnit_Framework_TestCase
{
    public function testTrueAssetsToTrue()
    {
        $condition = true;
        $this->assertTrue($condition);
    }


}
