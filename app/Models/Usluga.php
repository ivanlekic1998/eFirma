<?php

namespace app\Models;

use app\Models\Database;

class Usluga{

    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getAllServices() {
        return $this->database->executeGet("SELECT * FROM usluga");
    }

}