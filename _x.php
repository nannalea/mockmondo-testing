<?php
define('EMAIL_MIN_LEN', 3);
define('EMAIL_MAX_LEN', 50);
define('PASSWORD_MIN_LEN', 2);
define('PASSWORD_MAX_LEN', 20);

define('_REGEX_EMAIL', '/(?=^.{5,30}$)^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]){2,4}+$/');

define('_REGEX_PASSWORD_MIN_CHAR', 8);
define('_REGEX_PASSWORD_MIN_LETTER', 1);
define('_REGEX_PASSWORD_MIN_NUM', 1);
define('_REGEX_PASSWORD', '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');


function _validate_from_city_name()
{
    $from_city_name = $_GET['from_city_name'];

    if (!isset($_GET['from_city_name'])) {
        http_response_code(400);
        echo json_encode(['info' => 'Missing from_city_name variable']);
        exit();
    }

    if (strlen($from_city_name) < 1) { // Strlen = string length
        http_response_code(400);
        echo json_encode(['info' => 'from_city_name is too short']); // Return text as json
        exit();
    };

    if (strlen($from_city_name) > 20) {
        http_response_code(400);
        echo json_encode(['info' => 'from_city_name is too long']); // Return text as json
        exit();
    };
};

function _validate_to_city_name()
{
    $from_city_name = $_GET['to_city_name'];

    if (!isset($_GET['to_city_name'])) {
        http_response_code(400);
        echo json_encode(['info' => 'Missing to_city_name variable']);
        exit();
    }

    if (strlen($from_city_name) < 1) { // Strlen = string length
        http_response_code(400);
        echo json_encode(['info' => 'to_city_name is too short']); // Return text as json
        exit();
    };

    if (strlen($from_city_name) > 20) {
        http_response_code(400);
        echo json_encode(['info' => 'to_city_name is too long']); // Return text as json
        exit();
    };
};



function _validate_user_email()
{
    if (!isset($_POST['user_email'])) {
        _respond('user_email missing', 400);
    }
    $_POST['user_email'] = trim($_POST['user_email']);
    if (!preg_match(_REGEX_EMAIL, $_POST['user_email'])) {
        _respond('user_email invalid', 400);
    };
    return $_POST['user_email'];
}

function _validate_user_password()
{
    $error_message = 'user_password missing or invalid';
    if (!isset($_POST['user_password'])) {
        _respond($error_message, 400);
    }
    if (!preg_match(_REGEX_PASSWORD, $_POST['user_password'])) {
        _respond($error_message, 400);
    };
    return $_POST['user_password'];
}

function _validate_user_password_confirm()
{
    $error_message = 'user_password_confirm missing or does not match user_password';
    if (!isset($_POST['user_password_confirm'])) {
        _respond($error_message, 400);
    }
    if ($_POST['user_password'] != $_POST['user_password_confirm']) {
        _respond($error_message, 400);
    }
    return $_POST['user_password_confirm'];
}


// function that control the message
function _respond($message = '', $http_response_code = 200)
{
    // Set the message to be empty and the http_response_code to 200 per default (if the developer forget to sendt it)
    header('Content-Type: application/json'); // Makes the message look like a json object
    http_response_code($http_response_code);
    $response = is_array($message) ? $message : ['Info:' => $message]; // If the message is an array, leave it like that. Else (if it's text) make it into an asso array
    echo json_encode($response);
    exit();
}
