<?php

class Json
{
    public function convertPetsJsonToArray($jsonFile)
    {
        $pets = [];

        $filename = dirname(dirname(__FILE__)) . "/public/files/$jsonFile";
        if (file_exists($filename)) {
            $str = file_get_contents($filename);
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
        } else {
            return false;
        }
    }

    public function convertCompanyJsonToArray($jsonFile)
    {
        $inputData =['candidates' => [],
                     'phpTeamMembers' => [],
                     'javaTeamMembers' => [],
                     'phpTeamNeeds' => [],
                     'javaTeamNeeds' => []
        ];

        $filename = dirname(dirname(__FILE__)) . "/public/files/$jsonFile";
        if (file_exists($filename)){
            $str = file_get_contents($filename);
            $json = json_decode($str, true);
            foreach ($json['data']['candidates'] as $candidate) {
                $inputData['candidates'][] = new Candidate($candidate['name'],
                                                           $candidate['experience'],
                                                           $candidate['wantedSalary'],
                                                           $candidate['profile']);
            }
            foreach ($json['data']['phpTeamMembers'] as $tm) {
                if ($tm['position'] === ProfileEnum::Dev){
                    $inputData['phpTeamMembers'][] = new Developer($tm['name'],
                                                                   $tm['salary'],
                                                                   $tm['position'],
                                                                   $tm['team']);
                } elseif ($tm['position'] === ProfileEnum::QC){
                    $inputData['phpTeamMembers'][] = new QC($tm['name'],
                                                            $tm['salary'],
                                                            $tm['position'],
                                                            $tm['team']);
                } elseif ($tm['position'] === ProfileEnum::PM){
                    $inputData['phpTeamMembers'][] = new PM($tm['name'],
                                                            $tm['salary'],
                                                            $tm['position'],
                                                            $tm['team']);
                }
            }
            foreach ($json['data']['javaTeamMembers'] as $tm) {
                if ($tm['position'] === ProfileEnum::Dev){
                    $inputData['javaTeamMembers'][] = new Developer($tm['name'],
                                                                    $tm['salary'],
                                                                    $tm['position'],
                                                                    $tm['team']);
                } elseif ($tm['position'] === ProfileEnum::QC){
                    $inputData['javaTeamMembers'][] = new QC($tm['name'],
                                                             $tm['salary'],
                                                             $tm['position'],
                                                             $tm['team']);
                } elseif ($tm['position'] === ProfileEnum::PM){
                    $inputData['javaTeamMembers'][] = new PM($tm['name'],
                                                             $tm['salary'],
                                                             $tm['position'],
                                                             $tm['team']);
                }
            }
            foreach ($json['data']['phpTeamNeeds'] as $need) {
                $inputData['phpTeamNeeds'][] = new Need($need['experience'],
                                                        $need['wantedSalary'],
                                                        $need['profile']);
            }
            foreach ($json['data']['javaTeamNeeds'] as $need) {
                $inputData['javaTeamNeeds'][] = new Need($need['experience'],
                                                         $need['wantedSalary'],
                                                         $need['profile']);
            }
            return $inputData;
        } else {
            return false;
        }
    }
}
