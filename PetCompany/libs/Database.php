<?php

require_once 'DBSettings.php';

class Database extends PDO
{
    public function __construct($dsn = DBSettings::dsn, $username = DBSettings::username, $password = DBSettings::password)
    {
        parent::__construct($dsn, $username, $password);
    }

    public function createDB($dbFile)
    {
        $filename = dirname(dirname(__FILE__)) . "/public/files/$dbFile";
        $newDBName = pathinfo($dbFile, PATHINFO_FILENAME);
        $templine = '';

        if (file_exists($filename)) {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->exec("CREATE DATABASE $newDBName");
            $this->exec("use $newDBName");
            $lines = file($filename);
            foreach ($lines as $line) {
                if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == "/*")
                    continue;
                $templine .= $line;
            }
            $this->query($templine);
            return $this;
        } else {
            return false;
        }
    }

    public function dbExists($dbFile)
    {
        $dbName = pathinfo($dbFile, PATHINFO_FILENAME);

        $stmt = $this->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");
        $existDb = (bool)$stmt->fetchColumn();
        if ($existDb == 1) { //if exist returning this PDO connection
            $this->exec("use $dbName");
        } else {
            $this->createDB($dbFile);
        }
        return $this;
    }

    public function convertPetsDbToArray($dbFile)
    {
        $pets = [];

        $dbh = $this->dbExists($dbFile);
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

    public function convertCompanyDbToArray($dbFile)
    {
        $inputData =['candidates' => [],
                     'phpTeamMembers' => [],
                     'javaTeamMembers' => [],
                     'phpTeamNeeds' => [],
                     'javaTeamNeeds' => []
        ];

        $dbh = $this->dbExists($dbFile);
        foreach ($dbh->query('SELECT * from candidates') as $candidate){
            $inputData['candidates'][] = new Candidate($candidate['CAND_NAME'],
                                                       $candidate['CAND_EXPERIENCE'],
                                                       $candidate['CAND_WANTED_SALARY'],
                                                       $candidate['CAND_PROFILE']);
        }
        foreach ($dbh->query('SELECT SPEC_NAME, SPEC_SALARY, SPEC_POSITION, TEAM_NAME
                                      FROM specialist JOIN teams
                                      ON specialist.TEAM_ID = teams.TEAM_ID') as $tm){
            if ($tm['TEAM_NAME'] === 'PHP Team'){
                if ($tm['SPEC_POSITION'] === ProfileEnum::Dev){
                    $inputData['phpTeamMembers'][] = new Developer($tm['SPEC_NAME'],
                                                                   $tm['SPEC_SALARY'],
                                                                   $tm['SPEC_POSITION'],
                                                                   $tm['TEAM_NAME']);
                } elseif ($tm['SPEC_POSITION'] === ProfileEnum::QC){
                    $inputData['phpTeamMembers'][] = new QC($tm['SPEC_NAME'],
                                                            $tm['SPEC_SALARY'],
                                                            $tm['SPEC_POSITION'],
                                                            $tm['TEAM_NAME']);
                } elseif ($tm['SPEC_POSITION'] === ProfileEnum::PM){
                    $inputData['phpTeamMembers'][] = new PM($tm['SPEC_NAME'],
                                                            $tm['SPEC_SALARY'],
                                                            $tm['SPEC_POSITION'],
                                                            $tm['TEAM_NAME']);
                }
            } elseif ($tm['TEAM_NAME'] === 'Java Team'){
                if ($tm['SPEC_POSITION'] === ProfileEnum::Dev){
                    $inputData['javaTeamMembers'][] = new Developer($tm['SPEC_NAME'],
                                                                   $tm['SPEC_SALARY'],
                                                                   $tm['SPEC_POSITION'],
                                                                   $tm['TEAM_NAME']);
                } elseif ($tm['SPEC_POSITION'] === ProfileEnum::QC){
                    $inputData['javaTeamMembers'][] = new QC($tm['SPEC_NAME'],
                                                            $tm['SPEC_SALARY'],
                                                            $tm['SPEC_POSITION'],
                                                            $tm['TEAM_NAME']);
                } elseif ($tm['SPEC_POSITION'] === ProfileEnum::PM){
                    $inputData['javaTeamMembers'][] = new PM($tm['SPEC_NAME'],
                                                            $tm['SPEC_SALARY'],
                                                            $tm['SPEC_POSITION'],
                                                            $tm['TEAM_NAME']);
                }
            }
        }
        foreach ($dbh->query('SELECT NEED_EXPERIENCE,NEED_SALARY,NEED_PROFILE,TEAM_NAME
                                      FROM needs JOIN teams
                                      ON needs.TEAM_ID = teams.TEAM_ID') as $need){
            if ($need['TEAM_NAME'] === 'PHP Team'){
                $inputData['phpTeamNeeds'][] = new Need($need['NEED_EXPERIENCE'],
                                                        $need['NEED_SALARY'],
                                                        $need['NEED_PROFILE']);
            } elseif ($need['TEAM_NAME'] === 'Java Team'){
                $inputData['JavaTeamNeeds'][] = new Need($need['NEED_EXPERIENCE'],
                                                         $need['NEED_SALARY'],
                                                         $need['NEED_PROFILE']);
            }
        }
        return $inputData;
    }
}