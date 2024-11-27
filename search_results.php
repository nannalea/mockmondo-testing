<?php
require_once __DIR__ . '/api-get-search-results.php';

$flight_search = new FlightSearchResults();
$search_results = $flight_search->search($_GET['from_city_name'], $_GET['to_city_name']);
$search_results = urlencode(json_encode($search_results));
header("Location: view_search_results.php?search_results=$search_results");
exit;