<?php
require_once __DIR__ . '/_x.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css_login.css">

</head>


<body> 
    <div id="form-container">
        <a href="fly">
            <img src="img/logo-mobile.svg" alt="momondoo logo"></a>
        <div id="form-inner-container">
            <div id="top-info">
                <h1>Velkommen tilbage!</h1>
                <p>Log ind nedenfor</p>
            </div>

            <form id="signup_form" action="bridge_login.php" method="POST" onsubmit="validate(signup)">
                 <?php
                // Check if the callback message exists
                $callback_message = isset($_GET['callback_email']) ? $_GET['callback_email'] : '';

                // Display the callback message if it is not empty
                if (!empty($callback_message)) {
                    echo '<span class="email-hint error"> * ' . $callback_message . '</span>';
                }
                ?>
                <label for="">
                    <!--   Email (min <?php echo EMAIL_MIN_LEN ?> max <?php echo EMAIL_MAX_LEN ?> characters) -->
                    Email
                </label>
                <input type="email" placeholder="email" maxlength="<?= EMAIL_MAX_LEN ?>" name="user_email" data-validate="str" data-min="<?= EMAIL_MIN_LEN ?>" data-max="<?= EMAIL_MAX_LEN ?>">
                <?php
                    // Check if the callback message exists
                    $callback_message = isset($_GET['callback_password']) ? $_GET['callback_password'] : '';

                    // Display the callback message if it is not empty
                    if (!empty($callback_message)) {
                        echo '<span class="password-hint error"> * ' . $callback_message . '</span>';
                    }
                ?>
                <label for="">
                    <!--   password (min <?php echo PASSWORD_MIN_LEN ?> max <?php echo PASSWORD_MAX_LEN ?> characters) -->
                    Password
                </label>
                <input type="password" placeholder="password" maxlength="<?= PASSWORD_MAX_LEN ?>" name="user_password" data-validate="str" data-min="<?= PASSWORD_MIN_LEN ?>" data-max="<?= PASSWORD_MAX_LEN ?>">

              
                <button class="btn-login">Log ind</button>
                
            </form>

        </div>
        <div id="signup">
            <p>Har du ikke en bruger?</p>
            <a href="view_signup.php">Opret bruger</a>
        </div>
    </div>
    <div id="login">
        <h2>Start din rejse med Momondo!</h2>
        <p> Følg priser, organiser rejseplaner, og få adgang til medlemstilbud med din momondo-konto.</>
    </div>

    <script src="js_validator.js"></script>
</body>
<script src="js_validator.js"></script>

</html>