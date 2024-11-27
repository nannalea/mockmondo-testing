<div id="destinations">
    <div id="destination-info">
        <div>
            <h2><?php echo $dictionary[$lang . '_carousel_title'] ?></h2>
            <p><?php echo $dictionary[$lang . '_carousel_content'] ?></p>
        </div>
        <button class="btn-secondary"><?php echo $dictionary[$lang . '_carousel_btn'] ?></button>
    </div>
    <div id="slide-arrow-container">
        <button class="slide-arrow" id="btn-prev" onclick="clickPrev()">
            &#8249;
        </button>
        <button class="slide-arrow" id="btn-next" onclick="clickNext()">
            &#8250;
        </button>
        <div id="destination-mask">
            <div id="destination-carrusel">
                <div class="destination">
                    <div class="destination-img" id="destination1"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_1'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
                <div class="destination">
                    <div class="destination-img" id="destination2"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_2'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
                <div class="destination">
                    <div class="destination-img" id="destination3"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_3'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
                <div class="destination">
                    <div class="destination-img" id="destination4"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_4'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
                <div class="destination">
                    <div class="destination-img" id="destination5"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_5'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
                <div class="destination">
                    <div class="destination-img" id="destination"></div>
                    <div class="destination-info">
                        <h3><?php echo $dictionary[$lang . '_carousel_title_6'] ?></h3>
                        <p><?php echo $dictionary[$lang . '_carousel_content_all'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>