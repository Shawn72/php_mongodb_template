<?php
require_once('../src/validatePassword.php'); //dont forget this, remove one dot (.) before push to git

// use the following namespace
use PHPUnit\Framework\TestCase;

//class validatePasswordTest extends TestCase{  //uncomment when pushing to git
class validatePasswordTest extends PHPUnit_Framework_TestCase
{
    public function testValidLength(){
        $valpass = new validatePassword();
        $this->assertFalse($valpass-> validLength("1234")); //fails if the passlength is required (6)
        $this->assertTrue($valpass-> validLength("123456")); //pass if the passlength is required (6)
    }
}
