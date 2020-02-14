<?php


namespace App\Models;

class Database {
    private $pdo;

    public function __construct($server = 'localhost', $db = 'eFirma', $user = 'root', $password = '') {

        try {
            $this->pdo = new \PDO("mysql:host=" .$server . ";dbname=" .$db. ";charset=utf8", $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function executeGet($query) {

        try {
            return $this->pdo->query($query)->fetchAll();
        } catch(\PDOException $ex) {
            echo $ex->getMessage();
        }

    }

    public function executeNonGet($query, Array $params) {
        $prepared = $this->pdo->prepare($query);
        $prepared->execute($params);
        }

}