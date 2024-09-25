<?php

// 1. Require in the file you are testing
require_once 'plant-collect.php';

//2. We get access to PHPUnit

use PHPUnit\Framework\TestCase;

class CollectorTest extends TestCase{
    //Write your tests here
    //Test methods must start with 'test'
    //Make test names descriptive
    public function testReturnData()
    {
        //Make some test inputs
        $info=[
        'common_name' => 'Purple Top',
        'scientific_name' => 'Verbena bonariensis',
        'type' => 'Deciduous',
        'size' => '2.5 metres'
        ];

        //Define the expected result
        $expected = 'Purple Top<pre>Verbena bonariensis<pre>2.5 metres<pre>Deciduous';

        //What do we actually get?
        $actual = displayPlant($info);
        //Compare actual with expected
        $this->assertEquals($expected, $actual);
    }

    public function testPlantMalformedInputs()
    {
        $infos = '1';
//        //Make sure to tell PHPUnit to expect the exception before you trigger it
        $this->expectException(TypeError::class);
//        //Because we are going to get an exception there is no need to save $actual
//        adder($inputA, $inputB);
        displayPlant($infos);
    }
}