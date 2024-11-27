<?php

require_once '../api-get-flights.php';

$flight = new Flight;
$flight = $flight->getFlight();

echo '<pre>';
echo "Print Flight:";
print_r($flight);