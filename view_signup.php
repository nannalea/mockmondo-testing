<?php
require_once __DIR__ . '/_x.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_login.css">
    <title>Document</title>
</head>

<body>
    <div id="form-container">
        <a href="fly">
            <img src="img/logo-mobile.svg" alt="momondoo logo"></a>
        <div id="form-inner-container">
            <div id="top-info">
                <h1>Opret en ny bruger!</h1>
            </div>
            <form id="signup_form" onsubmit="signup(); return false">
                <label for="">
                    email
                </label>
                <span class="email-hint">Must follow the format name@email.com</span>
                <span class="email-inuse">Email is already in use</span>
                <input class="email" onblur="isEmailInUse()" type=" text" placeholder="email" maxlength="<?php echo EMAIL_MAX_LEN ?>" name="user_email" data-validate="email" data-min="<?php echo EMAIL_MIN_LEN ?>" data-max="<?php echo EMAIL_MAX_LEN ?>">
                <label for="">
                    Password
                </label>
                <span class=" password-hint" aria-live="assertive">Must contain min eight characters, at least one letter and one number</span>
                <input type="password" placeholder="password" onblur="validate(signup)" maxlength="<?= PASSWORD_MAX_LEN ?>" name="user_password" data-validate="regex" data-regex="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{<?= _REGEX_PASSWORD_MIN_CHAR ?>,}$">

                <button class=" btn-login">Signup</button>
            </form>
        </div>
        <div id="signup">
            <p>Har du allerede en bruger?</p>
            <a href="login">Log ind</a>
        </div>
    </div>
    <div id="login">
        <h2>Start din rejse med Momondo!</h2>
        <p> Følg priser, organiser rejseplaner, og få adgang til medlemstilbud med din momondo-konto.</>
    </div>
    <script src="js_validator.js"></script>

    <script>
        async function signup() {
            const the_form = document.querySelector("#signup_form");
            const conn = await fetch('api-signup.php', {
                method: "POST",
                body: new FormData(the_form)
            })
            const data = await conn.json() // Convert text to JSON

            console.log(data)

            if (!conn.ok) {
                console.log("Uppss...");
                Swal.fire({
                    icon: "error",
                    text: data.message,
                    title: "Something went wrong!",
                });
                return
            }

            // Success
            Swal.fire({
                title: 'Signup was Successful!',
                text: 'A confirmation email has been sent to ' + data.message,
                icon: 'success',
                color: '#fff',
                confirmButtonColor: '#0095cc',
                background: '#21033a'
            }).then(() => {
                location.href = "view_login.php";
            })
        }
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>