<div class="search-container">
    <form autocomplete="off" action="search_results.php">
        <div id="form-inner-container">
            <div id="from-container">
                <input id="from-input" class="input-icon <?php echo $_input_icon ?? "" ?>" name="from_city_name" type="text" placeholder="<?= $dictionary[$lang . '_from'] ?>"onfocus="clearSearchHistory('from')" oninput="showResults('from')" onblur="hideResults('from')">
                <div id="from-results"></div>
            </div>
            <div id="btn-switch"><img src="img/form-switch.svg" alt=""></div>
            <div id="to-container">
                <input id="to-input" class="input-icon <?php echo $_input_icon ?? "" ?>" name="to_city_name" type="text" placeholder="<?= $dictionary[$lang . '_to'] ?>"onfocus="clearSearchHistory('to')"  oninput="showResults('to')" onblur="hideResults('to')">
                <div id="to-results"></div>
            </div>
        </div>
        <!-- Onclick go to the search page and add the two cities -->
        <button id="search-btn" type="submit" type="submit" value="Go to search results page"><?= $dictionary[$lang . '_search'] ?></button>
        <span id="error-message"><?= $dictionary[$lang . '_error'] ?></span>
    </form>
    <?php
    require_once __DIR__ . '/comp-template-from-result.php';
    require_once __DIR__ . '/comp-template-to-result.php';
    ?>
</div>