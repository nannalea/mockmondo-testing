<?php

require_once __DIR__ . '/_x.php';

class Signup
{

    private $email_already_in_system;

    public function __construct()
    {
        $this->email_already_in_system = 'a@a.com';
    }

    public function validate($email, $password)
    {
        if ($this->email_already_in_system == $email) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'Email is already in use'];
        }

        if (!isset($email)) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'user_email missing'];
        }

        if (!preg_match(_REGEX_EMAIL, trim($email))) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'user_email invalid'];
        }

        if (!isset($password)) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'user_password missing'];
        }

        if (!preg_match(_REGEX_PASSWORD, $password)) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'user_password invalid'];
        }
        
        http_response_code(200);
        return ['response_code'=>200, 'message' => 'Email and password validated successfully'];
    }
}

$signup = new Signup();
echo json_encode($signup->validate($_POST['user_email'] ?? '', $_POST['user_password'] ?? ''));