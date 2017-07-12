<?php

require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Hamster.php';

class SQLdbConnection
{
    /*
    * Encapsulated function for connection to database
    */
    private static function dbConnect()
    {
        $dsn = 'mysql:dbname=petshopdb;host=localhost';
        $user = 'root';
        $password = '';

        try {
            $dbh = new PDO($dsn, $user, $password);
            return $dbh;
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getAllPetsAsArray()
    {
        $pets = array();
        $dbh = SQLdbConnection::dbConnect();
        foreach ($dbh->query('SELECT * from petsdb') as $row) {
            switch ($row['type']) {
                case 'cat':
                    $pets[] = new Cat($row['price'], $row['color'], $row['name'], $row['fluffiness']);
                    break;
                case 'dog':
                    $pets[] = new Dog($row['price'], $row['color'], $row['name']);
                    break;
                case 'hamster':
                    $pets[] = new Hamster($row['price'], $row['color'], $row['fluffiness']);
                    break;
            }
        }
        return $pets;
    }
}
