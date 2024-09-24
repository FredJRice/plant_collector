<?php

// 1. Require in the file you are testing
require_once 'src/plant-collect.php';

//2. We get access to PHPUnit

use PHPUnit\Framework\TestCase;

class plantTest{
    //Write your tests here
    //Test methods must start with 'test'
    //Make test names descriptive
    public function returnData()
    {
        //Make some test inputs



        //Define the expected result
        $expected = $value []

        //What do we actually get?
        $actual = adder($inputA, $inputB);
        //Compare actual with expected
        $this->assertEquals($expected, $actual);
    }

//    public function testAdderMalformedInputs()
//    {
//        $inputA = [1,2,3];
//        $inputB = [1,2,3];
//        //Make sure to tell PHPUnit to expect the exception before you trigger it
//        $this->expectException(TypeError::class);
//        //Because we are going to get an exception there is no need to save $actual
//        adder($inputA, $inputB);
//
//    }
}