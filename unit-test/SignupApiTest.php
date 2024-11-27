<?php

require_once 'api-signup.php';

use PHPUnit\Framework\TestCase;

class SignupApiTest extends TestCase {

    private $signup;

    public function setUp(): void {
        $this->signup = new Signup();
    }
    
    public function tearDown(): void {
        unset($this->signup);
    }

    public function testDataIsArray() {
        $data = $this->signup->validate('', '');
        $this->assertIsArray($data, 'The expected result is an array');
    }

    public function testDataHasKeyResponseCode() {
        $array = $this->signup->validate('', '');
        $key = 'response_code';
        $this->assertArrayHasKey($key, $array,'The expected result has key response_code');
    }

    public function testDataHasKeyMessage() {
        $array = $this->signup->validate('', '');
        $key = 'message';
        $this->assertArrayHasKey($key, $array,'The expected result has key message');
    }

    public function testMessageIsString() {
        $response = $this->signup->validate('', '')['message'];
        $this->assertIsString($response, 'The expected result is a string');
    }

    public function testResponseCodeIsNumeric() {
        $response = $this->signup->validate('', '')['response_code'];
        $this->assertIsNumeric($response, 'The expected result is a number');
    }

    /**
    * @dataProvider provideEmailAndResponseCode 
    */
    public function testEmailResponseMatch($mail, $expected_output) {
        $response = $this->signup->validate($mail, 'password12')['response_code'];
        $this->assertSame($response, $expected_output, 'The expected result is response_code match');
    }

    public static function provideEmailAndResponseCode() 
    { 
        return [
        ['', 400], // FAIL - email cannot be empty
        ['a@a.com', 400], // FAIL - email is already in use
        ['a@aaa', 400], // FAIL- email does not contain a '.'
        ['bb.com', 400], // FAIL - email does not contain '@'
        ['bbcom', 400], // FAIL - email does not contain '@' and '.'
        ['bbco.m', 400], // FAIL - email does not contain have between 2 and 4 characters after the dot
        ['a#aa@aaa?a.com', 400], // FAIL - email contains symbol that is not @
        ['b@b.com', 200], // SUCCESS 
        ['mail@news12.com', 200], // SUCCESS - mail including numbers
        // BLACK BOX
        ['b@.b', 400], // FAIL - email with less than 5 characters
        ['b@b.bb', 200], // PASS - email with 6 characters
        ['bbbbbbbbbbbb@bbbbbbbbbbbb.bbb', 200], // SUCCESS - email with 29 characters
        ['bbbbbbbbbbbb@bbbbbbbbbbbbb.bbb', 200], // SUCCESS - email with 30 characters
        ['bbbbbbbbbbbb@bbbbbbbbbbbbbb.bbb', 400], // FAIL - email with 31 characters
        ['x@x.x', 400], // FAIL - email with less than 2 characters after the dot
        ['x@x.xx', 200], // PASS - email with 2 characters after the dot
        ['x@x.xxx', 200], // PASS - email with 3 characters after the dot
        ['x@x.xxxx', 200], // PASS - email with 4 characters after the dot
        ['x@x.xxxxx', 400], // FAIL - email with more than 4 characters after the dot
        ]; 
    }

    /**
    * @dataProvider provideEmailAndMessage 
    */
    public function testEmailMessageMatch($mail, $expected_output) {
        $response = $this->signup->validate($mail, 'password12')['message'];
        $this->assertSame($response, $expected_output, 'The expected result is message match');
    }

    public static function provideEmailAndMessage() 
    { 
        return [
        ['a@a.com', 'Email is already in use'],
        ['a@aaa', 'user_email invalid'],
        ['b@b.com', 'Email and password validated successfully'],
        ]; 
    }

    /**
    * @dataProvider providePasswordAndMessage 
    */
    public function testPasswordMessageMatch($password, $expected_output) {
        $response = $this->signup->validate('b@b.com', $password)['message'];
        $this->assertSame($response, $expected_output, 'The expected result is message is the same');
    }

    public static function providePasswordAndMessage() 
    { 
        return [
            ['password12', 'Email and password validated successfully'],
            ['abc34defg', 'Email and password validated successfully'],
            ['akdkv34fekkdse', 'Email and password validated successfully'],
            ['1eKbBTEVms5sJ4TVVKDE', 'Email and password validated successfully'],
            ['', 'user_password invalid'],
            ['pass', 'user_password invalid'],
            ['pass23', 'user_password invalid'],
            ['94894984834', 'user_password invalid'],
            ['%&/#"!()=?%', 'user_password invalid'],
        ]; 
    }

    /**
    * @dataProvider providePasswordAndResponseCode
    */
    public function testPasswordResponseMatch($password, $expected_output) {
        $response = $this->signup->validate('b@b.com', $password)['response_code'];
        $this->assertSame($response, $expected_output, 'The expected result is response_code is the same');
    }

    public static function providePasswordAndResponseCode() 
    { 
        return [
        ['password12', 200], // PASS - password contains characthers and digits
        ['abc34defg', 200], // PASS - password contains characthers and digits
        ['akdkv34fekkdse', 200], // PASS - password contains characthers and digits
        ['1TEVms5sVDE', 200], // PASS - password contains characthers and digits
        ['', 400], // FAILS - password is empty
        ['94894984834', 400], // FAILS - password only contain digits
        ['%&/#"!()=?%', 400], // FAILS - password contains symbols
        // BLACK BOX
        ['passs12', 400], // FAILS - password is 7 characthers
        ['passss12', 200], // PASS - password is 8 characters
        ['passsss12', 200], // PASS - password is 9 characters
        ['passssssssssss12', 200], // PASS - password is above 8 characters
        ]; 
    }

}