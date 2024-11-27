<?php

require_once 'Info.php';

class DB {    
    public object $pdo;

    /**
     * Connect to the database
     */
    public function __construct() {
        $dsn = 'mysql:host=' . Info::HOST . ';dbname=' . Info::DB_NAME . ';charset=utf8';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        try {
            $this->pdo = @new PDO($dsn, Info::USER, Info::PASSWORD, $options); 
        } catch (\PDOException $e) {
            echo 'Connection unsuccessful';
            die('Connection unsuccessful: ' . $e->getMessage());
            exit();
        }
    }
    public function __destruct() {
        unset($this->pdo);
    }
}

?>