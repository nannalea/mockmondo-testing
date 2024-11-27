<?php

use PHPUnit\Framework\TestCase;

require_once 'api-delete-flight-from-db.php';

class deleteFlightTest extends TestCase 
{
    private DeleteFlight $flight_delete;

    protected function setUp(): void 
    {
        $this->flight_delete = $this->createMock(DeleteFlight::class);
        $this->flight_delete->method('deleteFlight')->willReturn([
            'info' => 'flight delete', 
            'flight_id' => '123456789'
        ]);
    }

    protected function tearDown(): void 
    {
        unset($this->flight_delete);
    }

    /** @test */

    /**
     * @dataProvider flightIdIsString
     */
    public function testIfFlightIdIsString($value, $expected) 
    {
        $this->flight_delete->flight_id = $value;
        $result = is_string($this->flight_delete->flight_id);

        $this->assertEquals($result, $expected);
    }

    public static function flightIdIsString()
    {
        return [
            ['100', true],
            ['10', true],
            ['1000000000', true],
            ['99092920', true],
            [1, false],
            [10, false],
            [10, false],
            [100009292, false]
        ];
    }

    /**
     * @dataProvider flightIdIsOnlyHasDigits
     */
    public function testIfFlightIdOnlyHasDigits($value, $expected) 
    {
        $this->flight_delete->flight_id = $value;
        $regex = "/^[0-9]*$/";
        $result = preg_match($regex, $this->flight_delete->flight_id);

        $this->assertEquals($result, $expected);
    }

    public static function flightIdIsOnlyHasDigits()
    {
        return [
            ['100', true],
            ['10', true],
            ['1000000000', true],
            ['99092920', true],
            ['abc', false],
            [' ', false],
            ['10a', false],
            ['-1', false],
            ['&', false]
        ];
    }

    public function testIfFlightDeleteIsArray()
    {
        $this->assertIsArray($this->flight_delete->deleteFlight());
    }

    public function testArrayLengthIs2()
    {
        $expectedLength = 2;
        $delete_flight_array = $this->flight_delete->deleteFlight();
        $this->assertCount($expectedLength, $delete_flight_array);
    }

    /**
     * @dataProvider provideArrayKeys
     */
    public function testArrayHasKeys($key)
    {
        $delete_flight_array = $this->flight_delete->deleteFlight();
        $this->assertArrayHasKey($key, $delete_flight_array);
    }

    public static function provideArrayKeys()
    {
        return [
            ['info'],
            ['flight_id'],
        ];
    }
}