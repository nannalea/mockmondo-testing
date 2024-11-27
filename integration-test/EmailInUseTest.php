<?php

require_once 'api-is-email-in-use.php';

use PHPUnit\Framework\TestCase;

class EmailInUseTest extends TestCase {

    private $email;

    public function setUp(): void {
        $this->email = new EmailInUse();
    }
    
    public function tearDown(): void {
        unset($this->email);
    }

    public function testDataIsArray() {
        $data = $this->email->isEmailAvailable('');
        $this->assertIsArray($data, 'The expected result is an array');
    }

    public function testDataHasKeyResponseCode() {
        $array = $this->email->isEmailAvailable('');
        $key = 'response_code';
        $this->assertArrayHasKey($key, $array,'The expected result has key response_code');
    }

    public function testDataHasKeyMessage() {
        $array = $this->email->isEmailAvailable('');
        $key = 'message';
        $this->assertArrayHasKey($key, $array,'The expected result has key message');
    }

    public function testMessageIsString() {
        $response = $this->email->isEmailAvailable('')['message'];
        $this->assertIsString($response, 'The expected result is a string');
    }

    public function testResponseCodeIsNumeric() {
        $response = $this->email->isEmailAvailable('')['response_code'];
        $this->assertIsNumeric($response, 'The expected result is a number');
    }

    public function testEmailResponseIs400() {
        $response = $this->email->isEmailAvailable('a@a.com')['response_code'];
        $expected_output = 400;
        $this->assertSame($response, $expected_output, 'The expected result is response_code is 400');
    }

    public function testEmailMessageIsEmailInUse() {
        $response = $this->email->isEmailAvailable('a@a.com')['message'];
        $expected_output = 'Email is already in use';
        $this->assertSame($response, $expected_output, 'The expected result is email is already in use');
    }

    /**
    * @dataProvider provideEmails 
    */
    public function testEmailResponseIs200($mail) {
        $response = $this->email->isEmailAvailable($mail)['response_code'];
        $expected_output = 200;
        $this->assertSame($response, $expected_output, 'The expected result is response_code is 200');
    }

    /**
    * @dataProvider provideEmails 
    */
    public function testEmailMessageIsEmailNotInUse($mail) {
        $response = $this->email->isEmailAvailable($mail)['message'];
        $expected_output = 'Email is not in use';
        $this->assertSame($response, $expected_output, 'The expected result is email is not in use');
    }

    public static function provideEmails() 
  { 
    return [
    ['b@b.com'],
    ['hello@today.com'],
    ['mail@another.dk'],
    ['bb@cc.dk'],
    ]; 
  }

}