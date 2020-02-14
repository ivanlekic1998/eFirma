<?php

namespace app\Models;

use app\Models\Database;

class Prodaja{

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllClients() {
        return $this->database->executeGet("SELECT * FROM prodaja");
    }

    public function getFirstFiveSales() {
        return $this->database->executeGet("SELECT p.id AS id, k.naziv AS nazivKlijent, u.naziv AS nazivUsluga, p.datum_usluge AS datumUsluge
        FROM prodaja AS p
        INNER JOIN usluga AS u ON p.id_usluga = u.id
        INNER JOIN klijent AS k ON p.id_klijent = k.id ORDER BY p.datum_usluge DESC LIMIT 5");
    }

    public function getDataForProdajePage() {
        return $this->database->executeGet("SELECT k.id AS idKlijent, p.id AS id, k.naziv AS nazivKlijent, u.naziv AS nazivUsluga, p.datum_usluge AS datumUsluge, p.cena AS cena
        FROM prodaja AS p
        INNER JOIN usluga AS u ON p.id_usluga = u.id
        INNER JOIN klijent AS k ON p.id_klijent = k.id ORDER BY p.datum_usluge");
    }

    public function insertProdaja($data) {

        $query = "INSERT INTO prodaja VALUES (NULL, ?, ?, ?, ?, ?)";
        $this->database->executeNonGet($query, $data);
    }

    public function getDataForClientProfilePage($id) {
        return $this->database->executeGet("SELECT p.id AS id, u.naziv AS usluga, p.cena AS cena, p.datum_usluge AS datum FROM klijent k INNER JOIN prodaja p ON k.id = id_klijent
        INNER JOIN usluga u ON p.id_usluga = u.id WHERE p.id_klijent=".$id);
    }

    public function getDataForClientReport($id) {
        return $this->database->executeGet("SELECT k.email AS email,  u.naziv AS usluga, p.cena AS cena, p.datum_usluge AS datum FROM klijent k INNER JOIN prodaja p ON k.id = id_klijent
        INNER JOIN usluga u ON p.id_usluga = u.id WHERE p.id=".$id);
    }

    public function getDataForPdfDocument($id) {
        return $this->database->executeGet("SELECT * from prodaja WHERE id=".$id);
    }

    public function getSearchProdaje($data) {
        return $this->database->executeGet("SELECT p.id AS id, k.naziv AS nazivKlijent, u.naziv AS nazivUsluga, p.datum_usluge AS datumUsluge, p.cena AS cena
        FROM prodaja AS p
        INNER JOIN usluga AS u ON p.id_usluga = u.id
        INNER JOIN klijent AS k ON p.id_klijent = k.id HAVING LOWER(k.naziv) LIKE LOWER('{$data}') OR p.cena LIKE LOWER('{$data}') OR LOWER(u.naziv) LIKE LOWER('{$data}')");
    }

}