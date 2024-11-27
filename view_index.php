<?php
$_title = 'Fly';
$_page = 'fly';
$_input_icon = "input-icon-{$_page}";
require_once __DIR__ . '/comp_header.php';
require_once __DIR__ . '/dictionary.php';
?>

<main class="main-page">
    <div class="slow-render">
        <h1><?= $dictionary[$lang . '_welcome'] ?></h1>
        <?php
        require_once __DIR__ . '/comp_search.php';
        ?>
    </div>
    <?php
    require_once __DIR__ . '/comp_info_box.php';
    require_once __DIR__ . '/comp_card.php';
    require_once __DIR__ . '/comp_carousel.php';
    require_once __DIR__ . '/comp_popular_cities.php';
    ?>
</main>

<?php
require_once __DIR__ . '/comp_footer.php'
?>