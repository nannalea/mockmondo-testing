<?php

require_once __DIR__ . '/_x.php';

class FlightSearchResults
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:' . __DIR__ . '/flights.db');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function search($from_city_name, $to_city_name)
    {   
        $q = $this->db->prepare("SELECT *, departure_city AS departure, arrival_city AS arrival FROM flights WHERE departure_city LIKE :from_city_name AND arrival_city LIKE :to_city_name");
        $q->bindValue(':from_city_name', '%' . $from_city_name . '%');
        $q->bindValue(':to_city_name', '%' . $to_city_name . '%');
        $q->execute();
    
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}