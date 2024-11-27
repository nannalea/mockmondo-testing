<?php
$_title = 'Oplevelser';
$_page = 'oplevelser';
$_input_icon = "input-icon-{$_page}";
require_once __DIR__ . '/comp_header.php'
?>


<main class="main-page">
    <div id="1">
        <h1><?php echo $dictionary[$lang . '_things_to_do'] ?></h1>
        <?php
        require_once __DIR__ . '/comp_search.php';
        ?>
    </div>
    <?php
    require_once __DIR__ . '/comp_info_box.php';
    require_once __DIR__ . '/comp_card.php';
    require_once __DIR__ . '/comp_carousel.php'
    ?>
</main>
<?php
require_once __DIR__ . '/comp_footer.php'
?>