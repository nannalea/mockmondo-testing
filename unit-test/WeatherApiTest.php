<?php

require_once 'api-get-weather.php';

use PHPUnit\Framework\TestCase;

class WeatherApiTest extends TestCase {

private $weather;

public function setUp(): void {
    $this->weather = $this->createStub(Weather::class);
    $this->weather->method('call')->willReturn([
      'request' => [
        'type' => 'City',
        'query' => 'Copenhagen, Denmark',
        'language' => 'en',
        'unit' => 'm'
      ],
      'location' => [
        'name' => 'Copenhagen',
        'country' => 'Denmark',
        'region' => 'Hovedstaden',
        'lat' => '55.667',
        'lon' => '12.583',
        'timezone_id' => 'Europe/Copenhagen',
        'localtime' => '2023-04-27 21:32',
        'localtime_epoch' => 1682631120,
        'utc_offset' => '2.0',
      ],
      'current' => [
        'observation_time' => '07:32 PM',
        'temperature' => 7,
        'weather_code' =>  113,
        'weather_icons' => ["https://cdn.worldweatheronline.com/images/wsymbols01_png_64/wsymbol_0008_clear_sky_night.png"],
        'weather_descriptions' => ["Clear"],
        'wind_speed' => 13,
        'wind_degree' => 126,
        'wind_dir' => 'W',
        'pressure' => 1018,
        'precip' => 0,
        'humidity' => 57,
        'cloudcover' => 0,
        'feelslike' => 4,
        'uv_index' => 1,
        'visibility' => 10,
        'is_day' => 'no',
      ]
    ]);
  }

  public function tearDown(): void {
    unset($this->weather);
  }

  public function testDataIsArray() {
    $data = $this->weather->call();
    $this->assertIsArray($data, 'The expected result is an array');
  }

   public function testArrayHasLength3() {
    $expectedLength = 3;
    $data = $this->weather->call();
    $this->assertCount($expectedLength, $data, 'The expected result is the array has a length of 3');
  }

  public function testArrayRequestHasLength4() {
    $expectedLength = 4;
    $data = $this->weather->call()['request'];
    $this->assertCount($expectedLength, $data, 'The expected result is the request array has a length of 4');
  }

  public function testArrayLocationHasLength9() {
    $expectedLength = 9;
    $data = $this->weather->call()['location'];
    $this->assertCount($expectedLength, $data, 'The expected result is the location array has a length of 9');
  }

  public function testArrayCurrentHasLength16() {
    $expectedLength = 16;
    $data = $this->weather->call()['current'];
    $this->assertCount($expectedLength, $data, 'The expected result is the current array has a length of 16');
  }

  /**
    * @dataProvider provideKeys 
  */
  public function testArrayHasKeys($array, $value){
    $data = $this->weather->call()[$array];
    $this->assertArrayHasKey($value, $data, "The expected result is array contains {$value}");
  }

  public static function provideKeys() 
  { 
    return [
    ['request', 'type'],
    ['request', 'query'],
    ['request', 'language'],
    ['request', 'unit'],
    ['location', 'name'],
    ['location', 'country'],
    ['location', 'region'],
    ['location', 'lat'],
    ['location', 'lon'],
    ['location', 'timezone_id'],
    ['location', 'localtime'],
    ['location', 'localtime_epoch'],
    ['location', 'utc_offset'],
    ['current', 'observation_time'],
    ['current', 'temperature'],
    ['current', 'weather_code'],
    ['current', 'weather_icons'],
    ['current', 'weather_descriptions'],
    ['current', 'wind_speed'],
    ['current', 'wind_degree'],
    ['current', 'wind_dir'],
    ['current', 'pressure'],
    ['current', 'precip'],
    ['current', 'humidity'],
    ['current', 'cloudcover'],
    ['current', 'feelslike'],
    ['current', 'uv_index'],
    ['current', 'visibility'],
    ['current', 'is_day'],
    ]; 
  }

    /**
    * @dataProvider provideIncorrectKeys 
  */
  public function testArrayDoesNotHaveKeys($array, $value){
    $data = $this->weather->call()[$array];
    $this->assertArrayNotHasKey($value, $data, "The expected result is array contains {$value}");
  }

  public static function provideIncorrectKeys() 
  { 
    return [
    ['request', 'user'],
    ['request', 'date'],
    ['location', 'coordinates'],
    ['location', 'season'],
    ['current', 'rain'],
    ['current', 'sun rise'],
    ]; 
  }

  public function testQueryIsString(){
    $query = $this->weather->call()['request']['query'];
    $this->assertIsString($query, "The query is expected to be a string");
  }

  public function testQueryContainsSearchedCity(){
    $query = "Copenhagen";
    $searched_city = $this->weather->call()['request']['query'];
    $this->assertStringContainsString($query, $searched_city, "The query is expected to contain the searched city");
  }

  // testing of weather descriptions
  public function testWeatherDescriptionsIsArray() {
    $data = $this->weather->call()['current']['weather_descriptions'];
    $this->assertIsArray($data, 'The expected result is an array');
  }

  public function testWeatherDescriptionLengthIsGreaterThanOrEqual1() {
    $expected = 1;
    $data = count($this->weather->call()['current']['weather_descriptions']);
    $this->assertGreaterThanOrEqual($expected, $data, 'The expected result has a length of 1 or more');
  }

  public function testWeatherDescriptionContainsValueClear() {
    $expected = "Clear";
    $data = $this->weather->call()['current']['weather_descriptions'];
    $this->assertContains($expected, $data, 'The expected result has description "clear"');
  }

   // testing of weather icons
   public function testWeatherIconsIsArray() {
    $data = $this->weather->call()['current']['weather_icons'];
    $this->assertIsArray($data, 'The expected result is an array');
  }

   public function testWeatherIconIsPng() {
    $expected = ".png";
    $data = $this->weather->call()['current']['weather_icons'][0];
    $this->assertStringEndsWith($expected, $data, 'The expected result is a png');
  }

  // --- TEST CASES BASED ON BLACK BOX
  //  --- testing of UV index ---
  public function testUvIndexIsInt(){
    $data = $this->weather->call()['current']['uv_index'];
    $this->assertIsInt($data, 'The value is expected to be an int');
  }

  public function testUvIsGreaterThanOrEqual0(){
    $data = $this->weather->call()['current']['uv_index'];
    $this->assertGreaterThanOrEqual(0, $data, 'The value is expected to be greater than or equal 0');
  } 

  public function testUvIsLessThanOrEqual45(){
    $data = $this->weather->call()['current']['uv_index'];
    $this->assertLessThanOrEqual(45, $data, 'The value is expected to be less than or equal 45');
  }

  public function testUvIsNotTheSameAsMinus1(){
    $data = $this->weather->call()['current']['uv_index'];
    $expected = -1;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  //  --- testing of wind speed ---
  public function testWindSpeedIsInt(){
    $data = $this->weather->call()['current']['wind_speed'];
    $this->assertIsInt($data, 'The value is expected to be an int');
  }

  public function testWindSpeedIsGreaterThanOrEqual0(){
    $data = $this->weather->call()['current']['wind_speed'];
    $this->assertGreaterThanOrEqual(0, $data, 'The value is expected to be greater than or equal 0');
  } 

  public function testWindSpeedIsLessThanOrEqual270(){
    $data = $this->weather->call()['current']['wind_speed'];
    $this->assertLessThanOrEqual(270, $data, 'The value is expected to be less than or equal 270');
  }

  public function testWindSpeedIsNotTheSameAsMinus1(){
    $data = $this->weather->call()['current']['wind_speed'];
    $expected = -1;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  public function testWindSpeedIsNotTheSameAs171(){
    $data = $this->weather->call()['current']['wind_speed'];
    $expected = 171;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  //  --- testing of temperature ---
  public function testTemperatureIsInt(){
    $data = $this->weather->call()['current']['temperature'];
    $this->assertIsInt($data, 'The value is expected to be an int');
  }

  public function testTemperatureIsGreaterThanOrEqualMinus90(){
    $data = $this->weather->call()['current']['temperature'];
    $this->assertGreaterThanOrEqual(-90, $data, 'The value is expected to be greater than or equal 0');
  } 

  public function testTemperatureIsLessThanOrEqual270(){
    $data = $this->weather->call()['current']['temperature'];
    $this->assertLessThanOrEqual(57, $data, 'The value is expected to be less than or equal 270');
  }

  public function testTemperatureIsNotTheSameAsMinus91(){
    $data = $this->weather->call()['current']['temperature'];
    $expected = -91;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  public function testTemperatureIsNotTheSameAs58(){
    $data = $this->weather->call()['current']['temperature'];
    $expected = 58;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  //  --- testing of feels_like ---
  public function testFeelsLikeIsInt(){
    $data = $this->weather->call()['current']['feelslike'];
    $this->assertIsInt($data, 'The value is expected to be an int');
  }

  public function testFeelsLikeIsGreaterThanOrEqualMinus90(){
    $data = $this->weather->call()['current']['feelslike'];
    $this->assertGreaterThanOrEqual(-90, $data, 'The value is expected to be greater than or equal 0');
  } 

  public function testFeelsLikeIsLessThanOrEqual270(){
    $data = $this->weather->call()['current']['feelslike'];
    $this->assertLessThanOrEqual(57, $data, 'The value is expected to be less than or equal 270');
  }

  public function testFeelsLikeIsNotTheSameAsMinus91(){
    $data = $this->weather->call()['current']['feelslike'];
    $expected = -91;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  public function testFeelsLikeIsNotTheSameAs58(){
    $data = $this->weather->call()['current']['feelslike'];
    $expected = 58;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  //  --- testing of humidity ---
  public function testHumidityIsInt(){
    $data = $this->weather->call()['current']['humidity'];
    $this->assertIsInt($data, 'The value is expected to be an int');
  }

  public function testHumidityIsGreaterThanOrEqual0(){
    $data = $this->weather->call()['current']['humidity'];
    $this->assertGreaterThanOrEqual(0, $data, 'The result is expected to be greater than or equal 0');
  } 

  public function testHumidityIsLessThanOrEqual100(){
    $data = $this->weather->call()['current']['humidity'];
    $this->assertLessThanOrEqual(100, $data, 'The result is expected to be less than or equal 100');
  }

  public function testHumidityIsNotTheSameAs101(){
    $data = $this->weather->call()['current']['humidity'];
    $expected = 101;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  public function testHumidityIsNotTheSameAsMinus1(){
    $data = $this->weather->call()['current']['humidity'];
    $expected = -1;
    $this->assertNotSame($data, $expected, 'The value is expected not to be the same');
  }

  //  --- testing of localtime ---
  public function testLocaltimeIsString(){
    $data = $this->weather->call()['location']['localtime'];
    $this->assertIsString($data, 'The value is expected to be a string');
  }

  public function testLocaltimeHasCorrectFormat(){
    $data = $this->weather->call()['location']['localtime'];
    $regex = '/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]/';
    $this->assertMatchesRegularExpression($regex, $data, 'The value is expected to have the format YYYY-MM-DD HH:MM');
  }

  public function testLocaltimeMonthIsGreaterThanOrEqual1(){
    $data = $this->weather->call()['location']['localtime'];
    $month = substr($data, 5, 2);
    $this->assertGreaterThanOrEqual(1, $month, 'The value is expected to be greater than or equal 1');
  } 
  
  public function testLocaltimeMonthIsLessThanOrEqual12(){
    $data = $this->weather->call()['location']['localtime'];
    $month = substr($data, 5, 2);
    $this->assertLessThanOrEqual(12, $month, 'The value is expected to be less than or equal 12');
  }

  public function testLocaltimeDayIsGreaterThanOrEqual1(){
    $data = $this->weather->call()['location']['localtime'];
    $day = substr($data, 8, 2);
    $this->assertGreaterThanOrEqual(1, $day, 'The value is expected to be greater than or equal 1');
  } 
  
  public function testLocaltimeDayIsLessThanOrEqual31(){
    $data = $this->weather->call()['location']['localtime'];
    $day = substr($data, 8, 2);
    $this->assertLessThanOrEqual(31, $day, 'The value is expected to be less than or equal 12');
  }

  public function testLocaltimeHourIsGreaterThanOrEqual0(){
    $data = $this->weather->call()['location']['localtime'];
    $hour = substr($data, 11, 2);
    $this->assertGreaterThanOrEqual(0, $hour, 'The value is expected to be greater than or equal 1');
  } 
  
  public function testLocaltimeHourIsLessThanOrEqual24(){
    $data = $this->weather->call()['location']['localtime'];
    $hour = substr($data, 11, 2);
    $this->assertLessThanOrEqual(24, $hour, 'The value is expected to be less than or equal 24');
  }

  public function testLocaltimeMinutesIsGreaterThanOrEqual0(){
    $data = $this->weather->call()['location']['localtime'];
    $minutes = substr($data, 14, 2);
    $this->assertGreaterThanOrEqual(0, $minutes, 'The value is expected to be greater than or equal 0');
  } 
  
  public function testLocaltimeMinutesIsLessThanOrEqual60(){
    $data = $this->weather->call()['location']['localtime'];
    $minutes = substr($data, 14, 2);
    $this->assertLessThanOrEqual(60, $minutes, 'The value is expected to be less than or equal 60');
  }

  //Epoch time
  public function testEpochMatchesLocaltime(){
    $epoch = date("Y-m-d H:i", substr($this->weather->call()['location']['localtime_epoch'], 0, 10));
    $localtime = $this->weather->call()['location']['localtime'];
    $this->assertSame($epoch, $localtime, 'The result is expected to be the same');
  }

  //test of remaining values
   /**
    * @dataProvider provideStringValues 
  */
  public function testValueIsString($array, $value){
    $data = $this->weather->call()[$array][$value];
    $this->assertIsString($data, "The result is expected to be a string");
  }

  public static function provideStringValues() 
  { 
    return [
    ['request', 'type'],
    ['request', 'query'],
    ['request', 'language'],
    ['request', 'unit'],
    ['location', 'name'],
    ['location', 'country'],
    ['location', 'region'],
    ['location', 'lat'],
    ['location', 'lon'],
    ['location', 'timezone_id'],
    ['location', 'localtime'],
    ['location', 'utc_offset'],
    ['current', 'observation_time'],
    ['current', 'wind_dir'],
    ['current', 'is_day'],
    ]; 
  }

  /**
    * @dataProvider provideNumericValues 
  */
  public function testValueIsNumeric($array, $value){
    $data = $this->weather->call()[$array][$value];
    $this->assertIsNumeric($data, "The result is expected to be a string");
  }

  public static function provideNumericValues() 
  { 
    return [
      ['location', 'localtime_epoch'],
      ['current', 'weather_code'],
      ['current', 'wind_degree'],
      ['current', 'pressure'],
      ['current', 'precip'],
      ['current', 'cloudcover'],
      ['current', 'visibility'],
    ]; 
  }
}