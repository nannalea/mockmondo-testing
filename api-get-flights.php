<?php

class Flight
{
    private array $flight = [];

    public function __construct()
    {
        $this->setFlight();
    }

    private function setFlight(): void
    {
           include_once 'db/RandomFlight.php';
           $flight = new RandomFlight();
           $flight = $flight->getRandomFlight();
           $this->flight['flight_id'] = $flight['flight_id'];
           $this->flight['departure_city'] = $flight['departure_city'];
           $this->flight['departure_city_img'] = $flight['departure_city_img'];
           $this->flight['departure_country'] = $flight['departure_country'];
           $this->flight['departure_airport'] = $flight['departure_airport'];
           $this->flight['departure_airport_code'] = $flight['departure_airport_code'];
           $this->flight['departure_date'] = $flight['departure_date'];
           $this->flight['departure_time'] = $flight['departure_time'];
           $this->flight['arrival_city'] = $flight['arrival_city'];
           $this->flight['arrival_city_img'] = $flight['arrival_city_img'];
           $this->flight['arrival_country'] = $flight['arrival_country'];
           $this->flight['arrival_airport'] = $flight['arrival_airport'];
           $this->flight['arrival_airport_code'] = $flight['arrival_airport_code'];
           $this->flight['arrival_date'] = $flight['arrival_date'];
           $this->flight['arrival_time'] = $flight['arrival_time'];
           $this->flight['airline'] = $flight['airline'];
           $this->flight['airline_logo'] = $flight['airline_logo'];
           $this->flight['travel_duration'] = $flight['travel_duration'];
           $this->flight['flight_price'] = $flight['flight_price'];
           $this->flight['stops'] = $flight['stops'];
           unset($flight);
    }

    public function getFlight(): array
    {
        return ['flight' => $this->flight];
    }
}

require_once 'db/RandomFlight.php';
$flights = new RandomFlight();
$flights = $flights->getAllFlights();