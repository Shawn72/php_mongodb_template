<?php
require_once('./src/validatePassword.php'); //dont forget this

class ValidatePasswordTest extends PHPUnit_Framework_TestCase{

    public function testValidLength(){
        $valpass = new ValidatePassword();
        $this->assertFalse($valpass-> validLength("1234")); //fails if the passlength is required (6)
        $this->assertTrue($valpass-> validLength("123456")); //pass if the passlength is required (6)
    }
}
