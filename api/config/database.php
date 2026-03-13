<?php
class Database {
    public static function connect() {
        return new PDO(
            "mysql:host=localhost;dbname=nexora_db;charset=utf8",
            "root",
            "",
            [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}