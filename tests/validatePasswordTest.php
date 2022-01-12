<?php
require_once('./src/validatePassword.php'); //dont forget this

// use the following namespace
use PHPUnit\Framework\TestCase;

class ValidatePasswordTest extends TestCase{

    public function testValidLength(){
        $valpass = new ValidatePassword();
        $this->assertFalse($valpass-> validLength("1234")); //fails if the passlength is required (6)
        $this->assertTrue($valpass-> validLength("123456")); //pass if the passlength is required (6)
    }
}
