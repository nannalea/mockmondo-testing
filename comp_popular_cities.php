<section id="popular_cities_section">
        <h2><?= $dictionary[$lang.'_popular_header']?></h2>
        <p id="description"><?= $dictionary[$lang.'_popular_text']?></p>
        <div id="card_wrapper">
       
            <div class="city_card" onclick="getWeather('nice')">
                <div class="card_image_wrapper" >
                    <img src="img/img_pop_card_1.jpeg" alt="city" loading="lazy">
                </div>
                <div class="card_txt">
                <p><?= $dictionary[$lang.'_popular_card_header']?></p>
                <p class="card_city">Nice</p>
                </div>
            </div>
        
        <div class="city_card" onclick="getWeather('alicante')">
            <div class="card_image_wrapper">
                <img src="img/img_pop_card_2.jpeg" alt="city" loading="lazy">
            </div>
            <div class="card_txt">
            <p><?= $dictionary[$lang.'_popular_card_header']?></p>
            <p class="card_city">Alicante</p>
            </div>
        </div>
        <div class="city_card" onclick="getWeather('berlin')">
            <div class="card_image_wrapper">
                <img src="img/img_pop_card_3.jpeg" alt="city" loading="lazy">
            </div>
            <div class="card_txt">
            <p><?= $dictionary[$lang.'_popular_card_header']?></p>
            <p class="card_city">Berlin</p>
            </div>
        </div>
        <div class="city_card" onclick="getWeather('lissabon')">
            <div class="card_image_wrapper">
                <img src="img/img_pop_card_4.jpeg" alt="city" loading="lazy">
            </div>
            <div class="card_txt">
            <p><?= $dictionary[$lang.'_popular_card_header']?></p>
            <p class="card_city">Lissabon</p>
            </div>
        </div>
        <div class="city_card" onclick="getWeather('athen')">
            <div class="card_image_wrapper">
                <img src="img/img_pop_card_5.jpeg" alt="city" loading="lazy">
            </div>
            <div class="card_txt">
            <p><?= $dictionary[$lang.'_popular_card_header']?></p>
            <p class="card_city">Athen</p>
            </div>
        </div>
        <div class="city_card" onclick="getWeather('stockholm')">
            <div class="card_image_wrapper">
                <img src="img/img_pop_card_6.jpeg" alt="city" loading="lazy">
            </div>
            <div class="card_txt">
            <p><?= $dictionary[$lang.'_popular_card_header']?></p>
            <p class="card_city">Stockholm</p>
            </div>
        </div>
        </div>
    </section>

    <script>
        function getWeather(city){
            window.location.href = "view_weather.php?city=" + city;
        };
    </script>