<?php

require_once 'db/DB.php';

class DeleteFlight
{
    public $flight_id;
    public $succes_message;

    public function __construct($flight_id)
    {

        if (!isset($flight_id)) {
            http_response_code(400);
            // echo 'flight_id missing';
            echo json_encode(['info' => 'flight_id missing']);
            exit();
        }
        
        if (!ctype_digit($flight_id)) {
            http_response_code(400);
            // echo 'flight_id must be a digit';
            //echo json_encode(['info' => 'flight_id must be a digit']);
            return;
        }
        
        $this->flight_id = $flight_id;

        $this->deleteFlight();
    }
    
    public function deleteFlight()
    {
        $db = new DB;

        $sql =<<<SQL
            DELETE FROM flights
            WHERE flight_id = $this->flight_id
        SQL;

        $stmt = $db->pdo->prepare($sql);
        $stmt->execute();

        $this->succes_message = json_encode(['info' => 'flight delete', 'flight_id' => $this->flight_id]);
        


     /*    try {
            $db = new PDO('/momondo-testing.sql');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $q = $db->prepare('DELETE FROM flights WHERE flight_id = :flight_id');
            $q->bindValue(':flight_id', $this->flight_id);
            $q->execute();
            // Success
            // echo "flight_id {$_POST['flight_id']}";
            echo json_encode(['info' => 'flight delete', 'flight_id' => $this->flight_id]);
            exit();
        } catch (Exception $ex) {
            http_response_code(500);
            echo json_encode(['info' => 'System under maintainance']);
            exit();
        } */
        
    }
}
// Validate the flight id
// 1, 2, 3, 4
/* if (!isset($_POST['flight_id'])) {
    http_response_code(400);
    // echo 'flight_id missing';
    echo json_encode(['info' => 'flight_id missing']);
    exit();
}

if (!ctype_digit($_POST['flight_id'])) {
    http_response_code(400);
    // echo 'flight_id must be a digit';
    echo json_encode(['info' => 'flight_id must be a digit']);
    exit();
}


try {
    $db = new PDO('sqlite:' . __DIR__ . '/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('DELETE FROM flights WHERE flight_id = :flight_id');
    $q->bindValue(':flight_id', $_POST['flight_id']);
    $q->execute();
    // Success
    // echo "flight_id {$_POST['flight_id']}";
    echo json_encode(['info' => 'flight delete', 'flight_id' => $_POST['flight_id']]);
    exit();
} catch (Exception $ex) {
    http_response_code(500);
    echo json_encode(['info' => 'System under maintainance']);
    exit();
}
 */
