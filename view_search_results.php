<?php
// session_start();
$_title = 'Search Results';
$_page = 'search_results';
require_once __DIR__.'/comp_header.php';
require_once __DIR__ . '/api-get-flights.php';
$search_results = json_decode(urldecode($_GET['search_results']), true);
?>
 <main id="flight-search">
      <div id="flight_modes_container">
         <div class="flight_modes">
            <p class="title">Billigste</p>
            <p class="price_and_time">$349 • 2h 03min.</p>
         </div>
         <div class="flight_modes active">
            <p class="title">Bedste</p>
            <p class="price_and_time">$549 • 1h 51min.</p>
         </div>
         <div class="flight_modes">
            <p class="title">Mindst CO2</p>
            <p class="price_and_time">$749 • 7h 35min.</p>
         </div>
         <div class="flight_modes">
            <p class="title">Vælg selv</p>
            <p class="price_and_time">Sammensæt din egen billet</p>
         </div>
      </div>
    <div id="flight_container">

         <?php
            foreach($search_results as $flight){
                ?>
       <div class="flight_card">
          <div class="left">
             <div class="from_flight">
                <img src="img/<?php echo $flight['airline_logo']?>" alt="<?php echo $flight['airline']?>">
                <div>
                   <p><?php echo $flight['departure_time'].' - '.$flight['arrival_time']?></p>
                   <p class="destination"><?php echo $flight['departure_city'].' - '.$flight['arrival_city']?></p>
                </div>
                <p class="flight_stops"><?php echo $flight['stops']?></p>
                <p><?php echo $flight['travel_duration']?></p>
             </div>
             <div class="to_flight">
                <img src="img/<?php echo $flight['airline_logo']?>" alt="<?php echo $flight['airline']?>">
                <div>
                   <p><?php echo $flight['arrival_time'].' - '.$flight['departure_time']?></p>
                   <p class="destination"><?php echo $flight['arrival_city'].' - '.$flight['departure_city']?></p>
                </div>
                <p class="flight_stops"><?php echo $flight['stops']?></p>
                <p><?php echo $flight['travel_duration']?></p>
             </div>
          </div>
          <div class="right">
             <p class="price">$<?php echo $flight['flight_price']?></p>
             <button>Se tilbud</button>
          </div>
       </div>
                <?php
            }
            ?>
    </div>
 </main>

 <?php
    require_once __DIR__.'/comp_footer.php';
    ?>