<?php

require_once __DIR__ . '/dictionary.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_title ?? 'No title....' ?></title>
    <link rel="stylesheet" href="css_search.css">
    <link rel="stylesheet" href="fonts/css_fonts.css">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico?v=e1d6cb1dcdb2b297976501a7f8dcc286525a9c8c&cluster=5" />
    <!-- import google fpnt pt sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" media="print" onload="this.media='all'">
    <!-- Fallback font -->
    <noscript>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" />
    </noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="weather-widget.css">
</head>


<body>
    <nav>
        <li>
            <div id="nav-burger" onclick="toggleBurger()"><img src="img/nav-burger.svg" alt="burger menu icon"></div>
            <?php
            session_start();
            if ($_SESSION) {
                echo "<a href='bridge_logout.php' class='nav-login " . ($_page == 'login' ? 'active' : '') . "'><img src='img/nav-profile.svg'><span>" . $dictionary[$lang . '_signout'] . "</span></a>";
            }
            if (!$_SESSION) {
                echo "<a href='login' class='nav-login " . ($_page == 'login' ? 'active' : '') . "'><img src='img/nav-profile.svg'><span>" . $dictionary[$lang . '_signin'] . "</span></a>";
            }
            if ($_SESSION) {
                echo "<a href='admin' id='admin-link' class='" . ($_page == 'admin' ? 'active' : '') . "'><img src='img/nav-admin.svg' alt='img/nav-admin.svg'><span>Admin</span></a>";
            }
            ?>


            <!-- <a href="view_signup.php" class="nav-login<?php echo $_page == 'login' ? 'active' : '' ?>"><img src="img/nav-profile.svg" alt="">Log ind</a> -->
            <div id="nav-login-container">
            </div>

            <a href="fly?lang=<?php echo $lang ?>" class="<?= $_page == 'fly' ? 'active' : '' ?>"><img src="img/nav-plane.svg" alt=""><span><?= $dictionary[$lang . '_flights'] ?></span><div class="slide-box"></div></a>
            <a href="overnatning?lang=<?php echo $lang ?>" class="<?= $_page == 'overnatning' ? 'active' : '' ?>"><img src="img/nav-bed.svg" alt=""><span><?= $dictionary[$lang . '_stays'] ?></span><div class="slide-box"></div></a>
            <a href="bil?lang=<?php echo $lang ?>" class="<?= $_page == 'bil' ? 'active' : '' ?>"><img src="img/nav-car.svg" alt=""><span><?= $dictionary[$lang . '_car_rental'] ?><div class="slide-box"></div></a>
            <a href="færger?lang=<?php echo $lang ?>" class="<?= $_page == 'færger' ? 'active' : '' ?>"><img src="img/nav-ferry.svg" alt=""><span><?= $dictionary[$lang . '_ferries'] ?></span><div class="slide-box"></div></a>
            <a href="oplevelser?lang=<?php echo $lang ?>" class="<?= $_page == 'oplevelser' ? 'active' : '' ?>"><img src="img/nav-experiences.svg" alt=""><span><?= $dictionary[$lang . '_things_to_do'] ?></span><div class="slide-box"></div></a>
        </li>
    </nav>
    <header>
        <div class="logo-container">
            <a href="fly">
                <picture>
                    <source srcset="mockmondo.png" media="(max-width: 900px)" />
                    <source srcset="mockmondo.png" media="(min-width: 900px)" />
                    <img src="https://via.placeholder.com/400" alt="example" />
                </picture>
            </a>
        </div>
        <li>
            <a id="trips-link" href="upload">Upload</a>

            <?php
            ini_set('display_errors', 0);
            session_start();
            // If the user is logged in show log ud : log ind
            if ($_SESSION) {
                echo "<a id='btn-login' href='bridge_logout.php'>" . $dictionary[$lang . '_signout'] . "</a>";
            }

            if (!$_SESSION) {
                echo "<a id='btn-login' href='login'>" . $dictionary[$lang . '_signin'] . "</a>";
            }
            ?>
            <?php if ($lang == "dk") {
                echo '<a id="dansk-flag-link"  href="?lang=en">  
                        <img src="img/en-flag.svg" alt="engelsk flag"> 
                        <p> English</p> 
                      </a>';
            } ?>
            <?php if ($lang == "en") {
                echo "<a id='dansk-flag-link' href='?lang=dk'>  
                        <img src='img/dk-flag.svg' alt='dansk flag'>  
                        <p> Dansk</p> 
                      </a>";
            } ?>

        </li>
    </header>