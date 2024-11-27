<?php 

require_once 'api-get-cities-from.php';

use PHPUnit\Framework\TestCase;

class GetCitiesApiTest extends TestCase {

    private $flightSearch;

    public function setUp(): void {
        $this->flightSearch = new FlightSearch();
    }

    public function tearDown(): void {
        unset($this->flightSearch);
    }

    
    // $flightSearch is an instance of FlightSearch
    
    public function testFlightSearchIsObject() {
        $data = $this->flightSearch;
        $this->assertInstanceOf(FlightSearch::class, $data);
    }

    public function testSearchReturnsArray() {
    
        $data = $this->flightSearch->search('');
        $this->assertIsArray($data);
    }

      /**
     * @dataProvider flightDataKeysProvider
     */

    public function testFlightDataHasKeys($key)
    {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertArrayHasKey($key, $flight, 'Flight data does not contain key: ' . $key . '');
        }
    }
    

    public static function flightDataKeysProvider()
    {
        return [
            ['flight_id'],
            ['departure_city'],
            ['departure_city_img'],
            ['departure_country'],
            ['departure_airport'],
            ['departure_airport_code'],
            ['departure_date'],
            ['departure_time'],
            ['arrival_city'],
            ['arrival_city_img'],
            ['arrival_country'],
            ['arrival_airport'],
            ['arrival_airport_code'],
            ['arrival_date'],
            ['arrival_time'],
            ['airline'],
            ['airline_logo'],
            ['flight_price'],
            ['travel_duration'],
            ['stops']
        ];
    }


    // Assert that the flight data has the correct data types for each key
    /**
     * @dataProvider flightDataTypesProvider
     */

    public function testFlightDataTypes($key, $type)
    {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertIsString($flight[$key], 'Flight data key: ' . $key . ' is not of type: ' . $type . '');
        }
    }
    
    public static function flightDataTypesProvider()
    {
        return [
            ['flight_id', 'string'],
            ['departure_city', 'string'],
            ['departure_city_img', 'string'],
            ['departure_country', 'string'],
            ['departure_airport', 'string'],
            ['departure_airport_code', 'string'],
            ['departure_date', 'string'],
            ['departure_time', 'string'],
            ['arrival_city', 'string'],
            ['arrival_city_img', 'string'],
            ['arrival_country', 'string'],
            ['arrival_airport', 'string'],
            ['arrival_airport_code', 'string'],
            ['arrival_date', 'string'],
            ['arrival_time', 'string'],
            ['airline', 'string'],
            ['airline_logo', 'string'],
            ['flight_price', 'string'],
            ['travel_duration', 'string'],
            ['stops', 'string']
        ];
    }


    //Assert flight id has only contain numbers and is 10 characters long

    public function testFlightIdMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[0-9]{10}$/', $flight['flight_id'], 'Flight id does not match regex');
        }
    }

    //Assert departure_city has only contain letters and spaces, commas, periods - but not start or end with a spcae and is between 2 and 50 characters long

    public function testFromCityNameMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z][a-zA-Z -.,]{2,50}$/', $flight['departure_city'], 'To city name does not match regex');
        }
    }

    // Assert to_city_name has only contain letters, spaces, commas, periods - but not start or end with a spcae and is between 2 and 50 characters long

    public function testToCityNameMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z][a-zA-Z -.,]{2,50}$/', $flight['arrival_city'], 'To city name does not match regex');
        }
    }

    //Assert to_country_name has only contain letters and periods and commas, but not start or end with a spcae and is between 2 and 50 characters long

    public function testToCountryNameMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z][a-zA-Z .,]{2,50}$/', $flight['arrival_country'], 'To country name does not match regex');
        }
    }
    

    //Assert from_country_name has only contain letters  but not start or end with a spcae and is between 2 and 50 characters long

    public function testFromCountryNameMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z][a-zA-Z ]{2,50}$/', $flight['departure_country'], 'From country name does not match regex');
        }
    }

    //Assert from_city_airport_short matches reget to be exatly 3 characters long, only contain letters and be all uppercase

    public function testFromCityAirportShortMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[A-Z]{3}$/', $flight['departure_airport_code'], 'From city airport short does not match regex');
        }
    }


    //Assert to_city_airport_short matches reget to be exatly 3 characters long, only contain letters and be all uppercase

    public function testToCityAirportShortMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^[A-Z]{3}$/', $flight['arrival_airport_code'], 'To city airport short does not match regex');
        }
    }


    // Assert departure_time in the format HH.MM or H.MM

     public function testDepartureTimeMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^([0-9]{1,2}).([0-9]{2})$/', $flight['departure_time'], 'Departure time does not match regex');
        }
    } 


    // Assert arrival_time in the format HH.MM or H.MM 
    public function testArrivalTimeMatchesRegex() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^([0-9]{1,2}).([0-9]{2})$/', $flight['arrival_time'], 'Arrival time does not match regex');
        }
    }

    

    // Assert search results are not empty)
    public function testSearchResultsNotEmpty() {
        $searchResults = $this->flightSearch->search('');

        $this->assertNotEmpty($searchResults, 'Search results are empty');
    }

/**
 * @dataProvider SearchResultsIncludeSearchTermProvider
 */
public function testSearchResultsIncludeSearchTerm($searchTerm, $expectedResult = true)
{
    $searchResults = $this->flightSearch->search($searchTerm);

    $found = false;
    foreach ($searchResults as $flight) {
        if (str_contains(strtolower($flight['departure_city']), strtolower($searchTerm))) {
            $found = true;
            break;
        }
    }

    $this->assertSame($expectedResult, $found, 'Search term match expectation');
}

public static function SearchResultsIncludeSearchTermProvider()
{
    return [
        [''],               // Expect sucesss - Empty search term should return all results
        ['Copen'],          // Expect success - Partial match
        ['Copenhagen'],     // Expect success - Exact match
        ['copenhagen'],     // Expect success - Case insensitive
        ['COPENHAGEN'],     // Expect success - Case insensitive 
        ['XYZ', false],     // Expect failure - No match 
        ['@#$%' , false],   // Expect failure - Special characters
        [123, false],       // Expect failure - Numeric input          
    ];
} 


    // Flight is a string... so cant test for positive or negative numbers
/* 
    public function testPriceIsPositive() {
        $searchResults = $this->flightSearch->search('Copenhagen');

        foreach ($searchResults as $flight) {
            $this->assertGreaterThanOrEqual(0, $flight['price'], 'Price is not a positive number');
        }
    }

    public function testPriceIsNotNegative() {
        $searchResults = $this->flightSearch->search('Copenhagen');

        foreach ($searchResults as $flight) {
            $this->assertGreaterThanOrEqual(0, $flight['price'], 'Price is a negative number');
        }
    } 
 */
// Assert airline name is only letters between 2 and 50 characters
    
        public function testAirlineNameIsOnlyLetters() {
            $searchResults = $this->flightSearch->search('');

    
            foreach ($searchResults as $flight) {
                $this->assertMatchesRegularExpression('/^[a-zA-Z]{2,50}$/', $flight['airline'], 'Airline name is not only letters between 2 and 50 characters');
            }
        }


    public function testStopIsDirectOr1StopOrStops() {
        $searchResults = $this->flightSearch->search('');

        foreach ($searchResults as $flight) {
            $this->assertMatchesRegularExpression('/^(Direct|1 stop|[0-9]+ stops)$/', $flight['stops'], 'Stop is not either "direct", "1 stop", "# stops"');
        }
    }
}