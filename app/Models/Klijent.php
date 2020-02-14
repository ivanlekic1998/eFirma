<?php

namespace app\Models;

use app\Models\Database;

class Klijent{

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllClients() {
        return $this->database->executeGet("SELECT * FROM klijent");
    }

    public function getFirstFiveClients() {
        return $this->database->executeGet("SELECT * FROM klijent ORDER BY datum_partnerstva DESC LIMIT 5");

    }

    public function insertKlijent($data) {

        $query = "INSERT INTO klijent VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->database->executeNonGet($query, $data);
    }
    public function deleteKlijent($id) {

        $query = "DELETE FROM klijent WHERE id = ?";
        $this->database->executeNonGet($query, [$id]);
    }

    public function updateKlijent($id, $data) {
        $query = "UPDATE klijent SET naziv=?, vlasnik=?, adresa=?, PIB=?, datum_partnerstva=?, ziro_racun=?, email=?, telefon=?, logo_firme=?, 
        napomena=?, aktivan=?, delatnost=? WHERE id =".$id;
        $this->database->executeNonGet($query, $data);
    }

    public function findKlijent($id) {
        $data = $this -> database->executeGet("SELECT * FROM klijent WHERE id=" .$id);

        if(!count($data)) {
            return "";
        }

        return $data;
    }

    public function checkUserData($username, $password) {
        $query = "SELECT * FROM user WHERE username='{$username}' AND password='{$password}'";
        return $this->database->executeGet($query);
    }

    public function getSearchKlijenti($data) {
        return $this->database->executeGet("SELECT id, naziv, vlasnik, adresa, PIB, email, delatnost, datum_partnerstva FROM klijent HAVING LOWER(naziv) LIKE LOWER('$data') OR LOWER(vlasnik) LIKE LOWER('$data') OR
LOWER(adresa) LIKE LOWER('$data') OR LOWER(PIB) LIKE LOWER('$data') OR LOWER(email) LIKE LOWER('$data') OR LOWER(delatnost) LIKE LOWER('$data')");
    }

}