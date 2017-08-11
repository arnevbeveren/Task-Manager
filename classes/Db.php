<?php

class Db {
    private static $conn = NULL;

    public static function getInstance()
    {
        if (isset(self::$conn)) {
            //er is al connectie, geef die terug
            return self::$conn;
        } else {
            // er is nog connectie, maak aan en geef terug
            self::$conn = new PDO("mysql:host=localhost; dbname=Taskmanager", "root", "root");
            return self::$conn;
        }
    }
}