<?php

class Model {

    protected $pdo;

    public function getConnection()
    {
            $this->pdo = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASS);
            return $this->pdo;
    }

}
