<?php

class EmailInUse{

    private $email_already_in_system;

    public function __construct()
    {
        $this->email_already_in_system = 'a@a.com';
    }

    public function isEmailAvailable($email)
    {
        if ($this->email_already_in_system == $email) {
            http_response_code(400);
            return ['response_code'=>400, 'message' => 'Email is already in use'];
        }
        
        http_response_code(200);
        return ['response_code'=>200, 'message' => 'Email is not in use'];
    }
}

$newEmail = $_POST['user_email'] ?? 0;
$email = new EmailInUse();

echo json_encode($email->isEmailAvailable($newEmail));