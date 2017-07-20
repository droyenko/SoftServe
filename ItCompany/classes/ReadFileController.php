<?php

class ReadFileController
{
    private $inputData =['candidates' => [],
                         'phpTeamMembers' => [],
                         'javaTeamMembers' => [],
                         'phpTeamNeeds' => [],
                         'javaTeamNeeds' => []
                        ];

    public function getInputData()
    {
        return $this->inputData;
    }


    public function getArrayFromSource($source)
    {
        $extension = pathinfo($source, PATHINFO_EXTENSION);
        if ($extension == 'json'){
            return $this->convertJsonToArray($source);
        } elseif ($extension == 'db'){

        }
    }

    public function convertJsonToArray($fileToRead)
    {
//        $str = file_get_contents(__DIR__ . $fileToRead);
        $str = file_get_contents('files/' . $fileToRead);
        $json = json_decode($str, true);
        foreach ($json['data']['candidates'] as $candidate) {
            $this->inputData['candidates'][] = new Candidate($candidate['name'], $candidate['experience'], $candidate['wantedSalary'], $candidate['profile']);
        }
        foreach ($json['data']['phpTeamMembers'] as $tm) {
            if ($tm['position'] === ProfileEnum::Dev){
                $this->inputData['phpTeamMembers'][] = new Developer($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            } elseif ($tm['position'] === ProfileEnum::QC){
                $this->inputData['phpTeamMembers'][] = new QC($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            } elseif ($tm['position'] === ProfileEnum::PM){
                $this->inputData['phpTeamMembers'][] = new PM($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            }
        }
        foreach ($json['data']['javaTeamMembers'] as $tm) {
            if ($tm['position'] === ProfileEnum::Dev){
                $this->inputData['javaTeamMembers'][] = new Developer($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            } elseif ($tm['position'] === ProfileEnum::QC){
                $this->inputData['javaTeamMembers'][] = new QC($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            } elseif ($tm['position'] === ProfileEnum::PM){
                $this->inputData['javaTeamMembers'][] = new PM($tm['name'], $tm['salary'], $tm['position'], $tm['team']);
            }
        }
        foreach ($json['data']['phpTeamNeeds'] as $need) {
            $this->inputData['phpTeamNeeds'][] = new Need($need['experience'], $need['wantedSalary'], $need['profile']);
        }
        foreach ($json['data']['javaTeamNeeds'] as $need) {
            $this->inputData['javaTeamNeeds'][] = new Need($need['experience'], $need['wantedSalary'], $need['profile']);
        }
        return $this->inputData;
    }

    public function convertDBToArray($fileToRead)
    {

    }
}