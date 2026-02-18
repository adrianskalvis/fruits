<?php

class Database {

    private $pdo;

    public function __construct($config) {

        $dsn = "mysql:" . http_build_query($config, arg_seperator: ";");
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }

    public function query($sql, $params = []) {

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt;

    }

}