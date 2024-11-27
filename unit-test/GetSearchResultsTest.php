<?php 

require_once 'api-get-search-results.php';

use PHPUnit\Framework\TestCase;

class GetSearchResultsTest extends TestCase

{
    private $flightSearch;
    private $results;

    protected function setUp(): void
    {
        $this->flightSearch = new FlightSearch();
        $from_city_name = 'Copenhagen';
        $to_city_name = 'London';
        $this->results = $this->flightSearch->search($from_city_name, $to_city_name);
    }

    public function testSearchResultsIsArray()
    {
        $this->assertIsArray($this->results);
    }

    public function testSearchResultsNotEmpty()
    {
        $this->assertNotEmpty($this->results);
    }

    // Assert that the search results are an array of arrays
    public function testSearchResultsIsArrayOfArrays()
    {
        foreach ($this->results as $result) {
            $this->assertIsArray($result);
        }
    }

    // Assert empty array is returned when no results are found
    public function testSearchReturnsEmptyArrayWhenNoResultsFound()
    {
        $from_city_name = 'Invalid City';
        $to_city_name = 'Invalid City';
        $results = $this->flightSearch->search($from_city_name, $to_city_name);
        $this->assertEmpty($results);
    }

    public function testSearchCanHandleEmptyStrings()
    {
        $from_city_name = '';
        $to_city_name = '';
        $results = $this->flightSearch->search($from_city_name, $to_city_name);
        $this->assertIsArray($results);
    }

    public function testSearchCanHandleSpecialCharacters()
    {
        $from_city_name = 'New@York';
        $to_city_name = 'Lond#on';
        $results = $this->flightSearch->search($from_city_name, $to_city_name);
        $this->assertIsArray($results);
    }
    
    public function DepartureContainsFromCityName()
    {
        foreach ($this->results as $result) {
            $this->assertStringContainsString('New York', $result['departure_city']);
        }
    }

    public function testSearchCanHandleVeryLongStrings()
    {
        $from_city_name = str_repeat('a', 1000);
        $to_city_name = str_repeat('b', 1000);
        $results = $this->flightSearch->search($from_city_name, $to_city_name);
        $this->assertIsArray($results);
    }

    public function ArrivalContainsToCityName()
    {
        foreach ($this->results as $result) {
            $this->assertStringContainsString('London', $result['arrival_city']);
        }
    }
}