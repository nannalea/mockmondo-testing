<?php

require_once 'DB.php';

class RandomFlight extends DB
{
    private static int $flightCount = 0;

    public function __construct()
    {
        parent::__construct();
        if (static::$flightCount === 0) {
            $sql =<<<'SQL'
                SELECT COUNT(*) AS total
                FROM flights;
            SQL;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            static::$flightCount = $stmt->fetch()['total'];
        }
    }

    /**
     * @return array
     */
    public function getRandomFlight(): array
    {
        $randomFlight = mt_rand(0, (static::$flightCount - 1));
        $sql =<<<SQL
            SELECT flight_id AS flight_id,
            departure_city AS departure_city,
            departure_city_img AS departure_city_img,
            departure_country AS departure_country,
            departure_airport AS departure_airport,
            departure_airport_code AS departure_airport_code,
            departure_date AS departure_date,
            departure_time AS departure_time,
            arrival_city AS arrival_city,
            arrival_city_img AS arrival_city_img,
            arrival_country AS arrival_country,
            arrival_airport AS arrival_airport,
            arrival_airport_code AS arrival_airport_code,
            arrival_date AS arrival_date,
            arrival_time AS arrival_time,
            airline AS airline,
            airline_logo AS airline_logo,
            flight_price AS flight_price,
            travel_duration AS travel_duration,
            stops AS stops
            FROM flights
            LIMIT $randomFlight, 1;
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllFlights(): array
    {
        $sql =<<<SQL
            SELECT *
            FROM flights
        SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}