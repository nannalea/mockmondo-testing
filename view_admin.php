<?php
$_title = 'Admin';
$_page = 'admin';
require_once __DIR__ . '/comp_header.php';
require_once __DIR__ . '/api-get-flights.php';
?>

<?php

?>
<main class="main-admin">

    <h1> Welcome
        <?php
        session_start();
        echo $_SESSION['user_name'];
        ?>, to the admin page!
    </h1>
    <p>Here you can delete flights from the database:</p>
    <?php
    foreach ($flights as $flight) {
        ?>

        <form class="flight-item">
            <div class="top-flight-info flex">
                <h2><?php echo $flight['departure_city'] ?> to</h2>
                <h2><?php echo $flight['arrival_city'] ?></h2>
            </div>
            <div class="flight-info-container">
                <div class="left-flight-info-container">
                    <div class="left-flight-info">
                        <div class="flight-logo"><img src="img/<?php echo $flight['airline_logo']?>" alt="<?php echo $flight['airline']?>"></div>
                        <div class="mid-flight-info">
                            <div class="flex">
                                <h3><?php echo $flight['departure_time'] ?> —</h3>
                                <h3> <?php echo $flight['arrival_time'] ?></h3>
                            </div>
                            <div class="flex">
                                <p><?php echo $flight['departure_airport_code'] ?> →</p>
                                <p> <?php echo $flight['arrival_airport_code'] ?></p>
                            </div>

                            <input style="display:none" name="flight_id" value="<?php echo $flight['flight_id'] ?>" type="text">

                        </div>
                        <div class="stops bold"><?php echo $flight['stops'] ?></div>
                        <div class="bold"> <?php echo $flight['travel_duration'] ?></div>

                    </div>
                    <div class="airline"><?php echo str_replace("_", " ", $flight['airline'])  ?></div>
                </div>
                <div class="price-container">
                    <p class="price">$<?php echo $flight['flight_price'] ?></p>
                    <p>Flybillet</p>
                    <button class="btn-delete" onclick="delete_flight()">
                        Delete
                    </button>
                </div>
            </div>

        </form>

        <?php
    }
    ?>
</main>
</main>
<?php
require_once __DIR__ . '/comp_footer.php'
?>