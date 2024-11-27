<?php
$_title = 'Weather';
$_page = 'weather';
$_input_icon = "input-icon-{$_page}";
require_once __DIR__ . '/comp_header.php';
require_once __DIR__ . '/dictionary.php';

require_once 'api-get-weather.php';

$weather = new Weather($_GET['city']);
$data = $weather->call();
?>

<main>
<div>
<div>
    <h2>Vejret på din valgte destination</h2>
    <form onsubmit="getWeather(); return false" id="weather_form">
        <input placeholder="Søg efter en anden destination" id="city_input"></input>
        <button type="submit" id="destination_search_button"><?= $dictionary[$lang . '_search'] ?></button>
    </from>
</div>
<div id="widget_container">
    <div id="location_wrapper">
        <p id="temperature"><?php echo $data['current']['temperature']?>°</p>
        <div>
            <p id="city_header"><?= $data['request']['query']?></p>
            <p id="date_header"><?= $data['location']['localtime']?></p>
                <div id="description_wrapper">
                    <img width="20" height="20" src="<?php echo $data['current']['weather_icons'][0]?>"></img>
                    <p id="description_header"><?php echo  $data['current']['weather_descriptions'][0]?></p>
                </div>
            </div>
        </div>
    <div id="details_container">
        <div class="detail_wrapper">
            <p class="detail_title">Feels like</p>
            <p class="detail"><?php echo $data['current']['feelslike']?>°</p>
        </div>
        <div class="detail_wrapper">
            <p class="detail_title">UV</p>
            <p class="detail"> <?php echo $data['current']['uv_index']?></p>
        </div>
        <div class="detail_wrapper">
            <p class="detail_title">Wind speed</p>
            <p class="detail"><?php echo $data['current']['wind_speed']?></p>
        </div>
        <div class="detail_wrapper">
            <p class="detail_title">humidity</p>
            <p class="detail"><?php echo $data['current']['humidity']?>%</p>
        </div>
    </div>
</div>
</div>
</main>

<script>
        function getWeather(){
            event.preventDefault()
            let city = document.querySelector("#city_input").value;
            window.location.href = "view_weather.php?city=" + city;
        };
</script>

<?php
require_once __DIR__ . '/comp_footer.php'
?>