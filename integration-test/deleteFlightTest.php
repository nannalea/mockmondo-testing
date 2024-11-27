<?php

use PHPUnit\Framework\TestCase;

require_once 'api-delete-flight-from-db.php';
require_once 'api-get-flights.php';

class deleteFlightTest extends TestCase 
{
    private DeleteFlight $flight_delete;
    private Flight $get_flight;
    private $id;

    protected function setUp(): void 
    {
        $this->get_flight = new Flight();
        $this->id = $this->get_flight->getFlight()['flight']['flight_id'];
    }

    protected function tearDown(): void 
    {
        unset($this->flight_delete);
    }

    /** @test */

    public function testIfFlightIdIsString() 
    {
        $this->assertIsString($this->get_flight->getFlight()['flight']['flight_id']);
    }

    public function testIfFlightIdOnlyHasDigits() 
    {
        $regex = "/^\d+$/";
        $result = $this->get_flight->getFlight()['flight']['flight_id'];

        $this->assertMatchesRegularExpression($regex, $result);
    }

    /**
     * @dataProvider flightIdContainsLetters
     */
    public function testIfFlightIdContainLetters($value)
    {
        $this->flight_delete = new DeleteFlight($value);
        $this->assertEquals(http_response_code(), 400);
    }

    public static function flightIdContainsLetters()
    {
        return [
            ['1234hg5'],
            ['hejsa'],
            ['10000ldkdkd'],
            ['1l2k3j4h'],
            ['&&123'],
            ['//']
        ];
    }

    public function testIfFlightDeleteIsObject()
    {
        $this->flight_delete = new DeleteFlight($this->id);
        $this->assertIsObject($this->flight_delete);
    }

    public function testIfFlightIsDeleted()
    {
        $this->flight_delete = new DeleteFlight($this->id);
        $this->assertJsonStringEqualsJsonString(
            json_encode(['info' => 'flight delete', 'flight_id' => $this->id]),
            $this->flight_delete->succes_message
        );
    }
}