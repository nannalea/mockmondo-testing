<?php

require_once 'api-get-flights.php';
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class getFlightTest extends TestCase {
    
    private Flight $flight;
    
    public function setUp(): void {
        $this->flight = $this->createStub(Flight::class);
        $this->flight->method('getFlight')->willReturn([
            'flight' => [
                'flight_id' => '1202367083',
                'departure_city' => 'Copenhagen',
                'departure_city_img' => 'copenhagen.jpg',
                'departure_country' => 'Denmark',
                'departure_airport' => 'Kastrup',
                'departure_airport_code' => 'CPH',
                'departure_date' => '01.10.2023',
                'departure_time' => '16.30',
                'arrival_city' => 'London',
                'arrival_city_img' => 'london.jpg',
                'arrival_country' => 'England',
                'arrival_airport' => 'Heathrow',
                'arrival_airport_code' => 'LHR',
                'arrival_date' => '20.10.2023',
                'arrival_time' => '17.30',
                'airline' => 'SAS',
                'airline_logo' => 'sas.png',
                'flight_price' => 125,
                'travel_duration' => '2h 05m',
                'stops' => 'Direct'
            ]
        ]);
    }
    public function tearDown(): void {
        unset($this->flight);
    }


    ### TESTS ###

    // ARRAY, KEYS AND DATA TYPES

    public function testFlightIsArray()
    {
        $this->assertIsArray($this->flight->getFlight()['flight']);
    }
    
    public function testFlightIsNotString()
    {
        $this->assertIsNotString($this->flight->getFlight()['flight']);
    }

    public function testFlightIsNotInt()
    {
        $this->assertIsNotInt($this->flight->getFlight()['flight']);
    }

    public function testArrayLengthIs20()
    {
        $expectedLength = 20;
        $array = $this->flight->getFlight()['flight'];
        $this->assertCount($expectedLength, $array, "Length of array does not match expected value of {$expectedLength}.");
    }

    /**
     * @dataProvider provideArrayHasKey
     */
    public function testArrayHasKey($key): void
    {
        $array = $this->flight->getFlight()['flight'];
        $this->assertArrayHasKey($key, $array, "Array does not contain '{$key}' as key.");
    }
    public static function provideArrayHasKey() {
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

    /**
     * @dataProvider provideArrayNotHasKey
     */
    public function testArrayNotHasKey($key): void
    {
        $array = $this->flight->getFlight()['flight'];
        $this->assertArrayNotHasKey($key, $array, "Array contains '{$key}' as key.");
    }
    public static function provideArrayNotHasKey() {
        return [
            // ['flight_id', false],
            // ['departure_city', false],
            // ['arrival_city', false],
            // ['departure_country', false],
            // ['arrival_country', false],
            ['from_city'],
            ['airport_code'],
            ['stopsss'],
            ['xxxxx'],
        ];
    }

    /**
     * @dataProvider provideKeyIsString
     */
    public function testKeyIsString($key): void
    {
        $this->assertIsString($this->flight->getFlight()['flight'][$key]);
    }

    public static function provideKeyIsString()
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
            // ['flight_price'],
            ['travel_duration'],
            ['stops']
        ];
    }

    /**
     * @dataProvider provideKeyIsNotInt
     */
    public function testKeyIsNotInt($key): void
    {
        $this->assertIsNotInt($this->flight->getFlight()['flight'][$key]);
    }
    public static function provideKeyIsNotInt()
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
            // ['flight_price'],
            ['travel_duration'],
            ['stops']
        ];
    }


    // FLIGHT_ID

    public function testFlightIDHasCorrectFormat(): void
    {
        $flightId = $this->flight->getFlight()['flight']['flight_id'];
        $this->assertMatchesRegularExpression("/^[0-9]{10}$/", $flightId, "The ID '{$flightId}' does not match regex.");
    }

    // Already indirectly tested the length in the format test above (eg. with regex), so this test kind of obsolete.
    // Kept it for now, but what is the best practice?
    public function testFlightIDHasLength10(): void
    {
        $expectedLength = 10;
        $flightId = $this->flight->getFlight()['flight']['flight_id'];
        $this->assertEquals($expectedLength, mb_strlen($flightId), "The ID '{$flightId}' does not match length of 10 characters.");
    }



    // DEPARTURE_CITY

    public function testDepartureCityHasCorrectFormat(): void
    {
        $departureCity = $this->flight->getFlight()['flight']['departure_city'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,85}$/", $departureCity, "The departure_city value '{$departureCity}' does not match regex.");
    }

    // Again, obsolete to do this or should we include it?
    // Is it better to separate format and length into two test (eg. dropping the length from the test above and keeping this)?
    // Second option means more code, but perhaps more readable?
    public function testDepartureCityHasLengthInRange(): void
    {
        $departureCity = $this->flight->getFlight()['flight']['departure_city'];
        $this->assertMatchesRegularExpression("/^.{2,85}$/", $departureCity, "The length of departure_city value '{$departureCity}' does not match the 2-85 range.");
    }



    // ARRIVAL_CITY

    public function testArrivalCityHasCorrectFormat(): void
    {
        $arrivalCity = $this->flight->getFlight()['flight']['arrival_city'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,85}$/", $arrivalCity, "The arrival_city value '{$arrivalCity}' does not match regex.");
    }

    // Same as above, decide on best option.
    public function testArrivalCityHasLengthInRange(): void
    {
        $arrivalCity = $this->flight->getFlight()['flight']['arrival_city'];
        $this->assertMatchesRegularExpression("/^.{2,85}$/", $arrivalCity, "The length of arrival_city value '{$arrivalCity}' does not match the 2-85 range.");
    }



    // DEPARTURE_COUNTRY

    public function testDepartureCountryHasCorrectFormat(): void
    {
        $departureCountry = $this->flight->getFlight()['flight']['departure_country'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,56}$/", $departureCountry, "The departure_country value '{$departureCountry}' does not match regex.");
    }

    public function testDepartureCountryHasLengthInRange(): void
    {
        $departureCountry = $this->flight->getFlight()['flight']['departure_country'];
        $this->assertMatchesRegularExpression("/^.{2,56}$/", $departureCountry, "The length of departure_country value '{$departureCountry}' does not match the 2-56 range.");
    }



    // ARRIVAL_COUNTRY

    public function testArrivalCountryHasCorrectFormat(): void
    {
        $arrivalCountry = $this->flight->getFlight()['flight']['arrival_country'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,56}$/", $arrivalCountry, "The arrival_country value '{$arrivalCountry}' does not match regex.");
    }

    public function testArrivalCountryHasLengthInRange(): void
    {
        $arrivalCountry = $this->flight->getFlight()['flight']['arrival_country'];
        $this->assertMatchesRegularExpression("/^.{2,56}$/", $arrivalCountry, "The length of arrival_country value '{$arrivalCountry}' does not match the 2-56 range.");
    }



    // DEPARTURE_AIRPORT

    public function testDepartureAirportHasCorrectFormat(): void
    {
        $departureAirport = $this->flight->getFlight()['flight']['departure_airport'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,100}$/", $departureAirport, "The departure_airport value '{$departureAirport}' does not match regex.");
    }

    public function testDepartureAirportHasLengthInRange(): void
    {
        $departureAirport = $this->flight->getFlight()['flight']['departure_airport'];
        $this->assertMatchesRegularExpression("/^.{2,100}$/", $departureAirport, "The length of departure_airport value '{$departureAirport}' does not match the 2-100 range.");
    }



    // ARRIVAL_AIRPORT

    public function testArrivalAirportHasCorrectFormat(): void
    {
        $arrivalAirport = $this->flight->getFlight()['flight']['arrival_airport'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå -]{2,100}$/", $arrivalAirport, "The arrival_airport value '{$arrivalAirport}' does not match regex.");
    }

    public function testArrivalAirportHasLengthInRange(): void
    {
        $arrivalAirport = $this->flight->getFlight()['flight']['arrival_airport'];
        $this->assertMatchesRegularExpression("/^.{2,100}$/", $arrivalAirport, "The length of arrival_airport value '{$arrivalAirport}' does not match the 2-100 range.");
    }



    // DEPARTURE_AIRPORT_CODE

    public function testDepartureAirportCodeHasCorrectFormat(): void
    {
        $departureAirportCode = $this->flight->getFlight()['flight']['departure_airport_code'];
        $this->assertMatchesRegularExpression("/^[A-Z]{3}$/", $departureAirportCode, "The departure_airport_code value '{$departureAirportCode}' does not match regex.");
    }

    public function testDepartureAirportCodeHasLength3(): void
    {
        $departureAirportCode = $this->flight->getFlight()['flight']['departure_airport_code'];
        $this->assertMatchesRegularExpression("/^.{3}$/", $departureAirportCode, "The length of departure_airport_code value '{$departureAirportCode}' does not match length of 3 characters.");
    }



    // ARRIVAL_AIRPORT_CODE

    public function testArrivalAirportCodeHasCorrectFormat(): void
    {
        $arrivalAirportCode = $this->flight->getFlight()['flight']['arrival_airport_code'];
        $this->assertMatchesRegularExpression("/^[A-Z]{3}$/", $arrivalAirportCode, "The arrival_airport_code value '{$arrivalAirportCode}' does not match regex.");
    }

    public function testArrivalAirportCodeHasLength3(): void
    {
        $arrivalAirportCode = $this->flight->getFlight()['flight']['arrival_airport_code'];
        $this->assertMatchesRegularExpression("/^.{3}$/", $arrivalAirportCode, "The length of arrival_airport_code value '{$arrivalAirportCode}' does not match length of 3 characters.");
    }



    // DEPARTURE_DATE

    public function testDepartureDateHasCorrectFormat(): void
    {
        $departureDate = $this->flight->getFlight()['flight']['departure_date'];
        $this->assertMatchesRegularExpression("/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/", $departureDate, "The departure_date value '{$departureDate}' does not match regex.");
    }

    public function testDepartureDateHasLength10(): void
    {
        $departureDate = $this->flight->getFlight()['flight']['departure_date'];
        $this->assertMatchesRegularExpression("/^.{10}$/", $departureDate, "The length of departure_date value '{$departureDate}' does not match length of 10 characters.");
    }

    // DEPARTURE_DATE > DAY

    public function testDepartureDayIsGreaterOrEqual01()
    {
        $lowestValue = 01;
        $departureDay = substr($this->flight->getFlight()['flight']['departure_date'], 0, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $departureDay, "The departure_date day value '{$departureDay}' is lower than {$lowestValue}.");
    }

    public function testDepartureDateDayIsLessOrEqual31()
    {
        $highestValue = 31;
        $departureDay = substr($this->flight->getFlight()['flight']['departure_date'], 0, 2);
        $this->assertLessThanOrEqual($highestValue, $departureDay, "The departure_date day value '{$departureDay}' result is higher than {$highestValue}.");
    }

    // DEPARTURE_DATE > MONTH

    public function testDepartureDateMonthIsGreaterOrEqual01()
    {
        $lowestValue = 01;
        $departureMonth = substr($this->flight->getFlight()['flight']['departure_date'], 3, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $departureMonth, "The departure_date month value '{$departureMonth}' is lower than {$lowestValue}.");
    }

    public function testDepartureDateMonthIsLessOrEqual12()
    {
        $highestValue = 12;
        $departureMonth = substr($this->flight->getFlight()['flight']['departure_date'], 3, 2);
        $this->assertLessThanOrEqual($highestValue, $departureMonth, "The departure_date month value '{$departureMonth}' result is higher than {$highestValue}.");
    }

    // DEPARTURE_DATE > YEAR

    public function testDepartureDateYearIsGreaterOrEqualToCurrentYear()
    {
        $lowestValue = date("Y");
        $departureYear = substr($this->flight->getFlight()['flight']['departure_date'], 6, 4);
        $this->assertGreaterThanOrEqual($lowestValue, $departureYear, "The departure_date year value '{$departureYear}' is lower than {$lowestValue}.");
    }

    public function testDepartureDateYearIsLessOrEqualToCurrentYearPlus3()
    {
        $highestValue = date("Y", strtotime('+3 year'));
        $departureYear = substr($this->flight->getFlight()['flight']['departure_date'], 6, 4);
        $this->assertLessThanOrEqual($highestValue, $departureYear, "The departure_date year value '{$departureYear}' result is higher than {$highestValue}.");
    }



    // ARRIVAL_DATE

    public function testArrivalDateHasCorrectFormat(): void
    {
        $arrivalDate = $this->flight->getFlight()['flight']['arrival_date'];
        $this->assertMatchesRegularExpression("/^(0[1-9]|[1-2][0-9]|3[0-1]).(0[1-9]|1[0-2]).[0-9]{4}$/", $arrivalDate, "The arrival_date value '{$arrivalDate}' does not match regex.");
    }

    public function testArrivalDateHasLength10(): void
    {
        $arrivalDate = $this->flight->getFlight()['flight']['arrival_date'];
        $this->assertMatchesRegularExpression("/^.{10}$/", $arrivalDate, "The length of arrival_date value '{$arrivalDate}' does not match length of 10 characters.");
    }

    // ARRIVAL_DATE > DAY

    public function testArrivalDayIsGreaterOrEqual01()
    {
        $lowestValue = 01;
        $arrivalDay = substr($this->flight->getFlight()['flight']['arrival_date'], 0, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $arrivalDay, "The arrival_date day value '{$arrivalDay}' is lower than {$lowestValue}.");
    }

    public function testArrivalDateDayIsLessOrEqual31()
    {
        $highestValue = 31;
        $arrivalDay = substr($this->flight->getFlight()['flight']['arrival_date'], 0, 2);
        $this->assertLessThanOrEqual($highestValue, $arrivalDay, "The arrival_date day value '{$arrivalDay}' result is higher than {$highestValue}.");
    }

    // ARRIVAL_DATE > MONTH

    public function testArrivalDateMonthIsGreaterOrEqual01()
    {
        $lowestValue = 01;
        $arrivalMonth = substr($this->flight->getFlight()['flight']['arrival_date'], 3, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $arrivalMonth, "The arrival_date month value '{$arrivalMonth}' is lower than {$lowestValue}.");
    }

    public function testArrivalDateMonthIsLessOrEqual12()
    {
        $highestValue = 12;
        $arrivalMonth = substr($this->flight->getFlight()['flight']['arrival_date'], 3, 2);
        $this->assertLessThanOrEqual($highestValue, $arrivalMonth, "The arrival_date month value '{$arrivalMonth}' result is higher than {$highestValue}.");
    }

    // ARRIVAL_DATE > YEAR

    public function testArrivalDateYearIsGreaterOrEqualToCurrentYear()
    {
        $lowestValue = date("Y");
        $arrivalYear = substr($this->flight->getFlight()['flight']['arrival_date'], 6, 4);
        $this->assertGreaterThanOrEqual($lowestValue, $arrivalYear, "The arrival_date year value '{$arrivalYear}' is lower than {$lowestValue}.");
    }

    public function testArrivalDateYearIsLessOrEqualToCurrentYearPlus3()
    {
        $highestValue = date("Y", strtotime('+3 year'));
        $arrivalYear = substr($this->flight->getFlight()['flight']['arrival_date'], 6, 4);
        $this->assertLessThanOrEqual($highestValue, $arrivalYear, "The arrival_date year value '{$arrivalYear}' result is higher than {$highestValue}.");
    }



    // DEPARTURE_TIME

    public function testDepartureTimeHasCorrectFormat(): void
    {
        $departureTime = $this->flight->getFlight()['flight']['departure_time'];
        $this->assertMatchesRegularExpression("/^(2[0-3]|[0-1][0-9])[.][0-5][0-9]$/", $departureTime, "The departure_time value '{$departureTime}' does not match regex.");
    }

    public function testDepartureTimeHasLength5(): void
    {
        $departureTime = $this->flight->getFlight()['flight']['departure_time'];
        $this->assertMatchesRegularExpression("/^.{5}$/", $departureTime, "The length of departure_time value '{$departureTime}' does not match length of 5 characters.");
    }

    // DEPARTURE_TIME > HOUR

    public function testDepartureTimeHourIsGreaterOrEqual00()
    {
        $lowestValue = 00;
        $departureHour = substr($this->flight->getFlight()['flight']['departure_date'], 0, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $departureHour, "The departure_time hour '{$departureHour}' is lower than {$lowestValue}.");
    }

    public function testDepartureTimeHourIsLessOrEqual23()
    {
        $highestValue = 23;
        $departureHour = substr($this->flight->getFlight()['flight']['departure_time'], 0, 2);
        $this->assertLessThanOrEqual($highestValue, $departureHour, "The departure_time hour '{$departureHour}' result is higher than {$highestValue}.");
    }

    // DEPARTURE_TIME > MINUTE

    public function testDepartureTimeMinuteIsGreaterOrEqual00()
    {
        $lowestValue = 00;
        $departureMinute = substr($this->flight->getFlight()['flight']['departure_time'], 3, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $departureMinute, "The departure_time minute value '{$departureMinute}' is lower than {$lowestValue}.");
    }

    public function testDepartureTimeMinuteIsLessOrEqual59()
    {
        $highestValue = 59;
        $departureMinute = substr($this->flight->getFlight()['flight']['departure_time'], 3, 2);
        $this->assertLessThanOrEqual($highestValue, $departureMinute, "The departure_time minute value '{$departureMinute}' result is higher than {$highestValue}.");
    }



    // ARRIVAL_TIME

    public function testArrivalTimeHasCorrectFormat(): void
    {
        $arrivalTime = $this->flight->getFlight()['flight']['arrival_time'];
        $this->assertMatchesRegularExpression("/^(2[0-3]|[0-1][0-9])[.][0-5][0-9]$/", $arrivalTime, "The arrival_time value '{$arrivalTime}' does not match regex.");
    }

    public function testArrivalTimeHasLength5(): void
    {
        $arrivalTime = $this->flight->getFlight()['flight']['arrival_time'];
        $this->assertMatchesRegularExpression("/^.{5}$/", $arrivalTime, "The length of arrival_time value '{$arrivalTime}' does not match length of 5 characters.");
    }

    // ARRIVAL_TIME > HOUR

    public function testArrivalTimeHourIsGreaterOrEqual00()
    {
        $lowestValue = 00;
        $arrivalHour = substr($this->flight->getFlight()['flight']['arrival_date'], 0, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $arrivalHour, "The arrival_time hour '{$arrivalHour}' is lower than {$lowestValue}.");
    }

    public function testArrivalTimeHourIsLessOrEqual23()
    {
        $highestValue = 23;
        $arrivalHour = substr($this->flight->getFlight()['flight']['arrival_time'], 0, 2);
        $this->assertLessThanOrEqual($highestValue, $arrivalHour, "The arrival_time hour '{$arrivalHour}' result is higher than {$highestValue}.");
    }

    // ARRIVAL_TIME > MINUTE

    public function testArrivalTimeMinuteIsGreaterOrEqual00()
    {
        $lowestValue = 00;
        $arrivalMinute = substr($this->flight->getFlight()['flight']['arrival_time'], 3, 2);
        $this->assertGreaterThanOrEqual($lowestValue, $arrivalMinute, "The arrival_time minute value '{$arrivalMinute}' is lower than {$lowestValue}.");
    }

    public function testArrivalTimeMinuteIsLessOrEqual59()
    {
        $highestValue = 59;
        $arrivalMinute = substr($this->flight->getFlight()['flight']['arrival_time'], 3, 2);
        $this->assertLessThanOrEqual($highestValue, $arrivalMinute, "The arrival_time minute value '{$arrivalMinute}' result is higher than {$highestValue}.");
    }



    // TRAVEL_DURATION

    // Allowed formats: '2h 10m', '12h 15m', '0h 50m'
    public function testTravelDurationHasCorrectFormat(): void
    {
        $travelDuration = $this->flight->getFlight()['flight']['travel_duration'];
        $this->assertMatchesRegularExpression("/^([0-9]{1,2})[h][ ]([0-9]{2})[m]$/", $travelDuration, "The travel_duration value '{$travelDuration}' does not match regex.");
    }

    public function testTravelDurationHasLengthInRange(): void
    {
        $travelDuration = $this->flight->getFlight()['flight']['travel_duration'];
        $this->assertMatchesRegularExpression("/^.{6,7}$/", $travelDuration, "The length of travel_duration value '{$travelDuration}' does not match length of 6-7 characters.");
    }

    // > ADD TEST: DURATION MATCHES DEP/ARR TIMES?
    // > ADD TEST: DEPARTURE TIME IS BEFORE ARRIVAL TIME (AND THE OTHER WAY AROUND)?



    // DEPARTURE_CITY_IMG

    public function testDepartureCityImgRefersToValidImageFile(): void
    {
        $fileName = $this->flight->getFlight()['flight']['departure_city_img'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $acceptedImageFormats = ['png', 'jpeg', 'jpg'];

        $this->assertContains($fileExtension, $acceptedImageFormats, "The file format '.{$fileExtension}' is not allowed – should be a PNG or JPEG/JPG.");
    }



    // ARRIVAL_CITY_IMG

    public function testArrivalCityImgRefersToValidImageFile(): void
    {
        $fileName = $this->flight->getFlight()['flight']['departure_city_img'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $acceptedImageFormats = ['png', 'jpeg', 'jpg'];

        $this->assertContains($fileExtension, $acceptedImageFormats, "The file format '.{$fileExtension}' is invalid. Only PNG and JPEG/JPGs are allowed.");
    }



    // FLIGHT_PRICE

    public function testFlightPriceIsInt(): void
    {
        $flightPrice = $this->flight->getFlight()['flight']['flight_price'];
        $this->assertIsInt($flightPrice, "flight_price '{$flightPrice}' is not an integer.");
    }

    public function testFlightPriceHasCorrectFormat(): void
    {
        $flightPrice = $this->flight->getFlight()['flight']['flight_price'];
        $this->assertMatchesRegularExpression("/^[1-9][0-9]*$/", $flightPrice, "The flight_price value '{$flightPrice}' does not match regex.");
    }

    public function testFlightPriceIsGreaterOrEqual1()
    {
        $lowestValue = 1;
        $flightPrice = $this->flight->getFlight()['flight']['flight_price'];
        $this->assertGreaterThanOrEqual($lowestValue, $flightPrice, "The flight_price '{$flightPrice}' is lower than {$lowestValue}.");
    }


    
    // AIRLINE

    public function testAirlineHasCorrectFormat(): void
    {
        $airline = $this->flight->getFlight()['flight']['airline'];
        $this->assertMatchesRegularExpression("/^[a-zA-ZÆØÅæøå .-]{2,100}$/", $airline, "The airline value '{$airline}' does not match regex.");
    }

    public function testAirlineHasLengthInRange(): void
    {
        $airline = $this->flight->getFlight()['flight']['airline'];
        $this->assertMatchesRegularExpression("/^.{2,50}$/", $airline, "The length of airline value '{$airline}' does not match the [2,100] range.");
    }



    // AIRLINE_LOGO

    public function testAirlineLogoRefersToValidImageFile(): void
    {
        $fileName = $this->flight->getFlight()['flight']['airline_logo'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $acceptedImageFormats = ['png', 'jpeg', 'jpg'];

        $this->assertContains($fileExtension, $acceptedImageFormats, "The file format '.{$fileExtension}' is not allowed – should be a PNG or JPEG/JPG.");
    }



    // STOPS

    public function testStopsHasCorrectFormat(): void
    {
        $stops = $this->flight->getFlight()['flight']['stops'];
        $this->assertMatchesRegularExpression("/^[Dd]irect$|^1 stop$|^[2-9] stops$|^[1][0] stops$/", $stops, "The stops value '{$stops}' does not match regex.");
    }

    public function teststopsHasLengthInRange(): void
    {
        $stops = $this->flight->getFlight()['flight']['stops'];
        $this->assertMatchesRegularExpression("/^.{6,8}$/", $stops, "The length of stops value '{$stops}' does not match the [2,100] range.");
    }
}