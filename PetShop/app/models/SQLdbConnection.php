<?php

require_once 'Cat.php';
require_once 'Dog.php';
require_once 'Hamster.php';

class SQLdbConnection
{
    private static function dbConnect()
    {
        $dsn = 'mysql:host=localhost';
        $user = 'root';
        $password = '';
        $newbdname = 'petshopdb';
        $templine = '';

        try {
            //connect to MySQL and check whether the necessary database exist or not
            $dbh = new PDO($dsn, $user, $password);
            $stmt = $dbh->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$newbdname'");
            $existDb = (bool)$stmt->fetchColumn();
            if ($existDb == 1) { //if exist returning this PDO connection
                $dbh->exec("use $newbdname");
            } else { //if not exist creating new database and fill it with data from *.sql file
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $dbh->exec("CREATE DATABASE $newbdname");

                $dbh->exec("use $newbdname");

                $lines = file(dirname(dirname(dirname(__FILE__))) .'\public\files\petsdb.sql');
                foreach ($lines as $line) {
                    if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == "/*")
                        continue;
                    $templine .= $line;
                }
                $dbh->query($templine);
            }
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
        return $dbh;
    }

    public static function convertDBToArray()
    {
        $pets = [];
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

    public static function convertJsonToArray()
    {
        $pets = [];
        $str = file_get_contents(dirname(dirname(dirname(__FILE__))) .'\public\files\petsdb.json');
        $json = json_decode($str, true);
        foreach ($json as $row){
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
