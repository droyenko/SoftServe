<?php

class SQLdbConnection
{
    /*
    * Encapsulated function for connection to database
    */
    private function dbConnect()
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

    public static function selectPetByType($type)
    {
        $dbh = SQLdbConnection::dbConnect();
        $sth = $dbh->prepare("SELECT name,price,color,fluffiness FROM petsdb WHERE type= :type");
        $sth->execute(array(':type' => $type));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addPet($price, $color, $name, $fluffiness, $type)
    {
        $dbh = SQLdbConnection::dbConnect();
        $sth = $dbh->prepare("INSERT INTO petsdb(price, color, name, fluffiness, type)
                              VALUES(:price, :color, :name, :fluffiness, :type)");
        $sth->execute(array(':price' => $price, ':color' => $color, ':name' => $name, ':fluffiness' => $fluffiness, ':type' => $type));
    }

    public static function getAvgPrice()
    {
        $dbh = SQLdbConnection::dbConnect();
        $sth = $dbh->prepare("SELECT price FROM petsdb WHERE type= :type");
        $sth->execute(array(':type' => $type));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}

print_r(SQLdbConnection::selectPetByType('cat'));