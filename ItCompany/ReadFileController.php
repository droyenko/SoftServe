<?php

class ReadFileController
{
    public function readJsonFile($file)
    {
        $str = file_get_contents($file);
        $json = json_decode($str, true);
        foreach ($json['data'] as $data => $value) {
            if ($data == 'candidates'){
                for ($i = 0; $i<count($json['data']['candidates']);$i++)
                    foreach ($json['data']['candidates'][$i] as $field => $value) {
                        $candidate[$i] = new Candidate($json['data']['candidates'][$i]);
                    }
            } elseif ($data == 'teamMembers'){

            } elseif ($data == 'javaTeamNeeds'){

            } elseif ($data == 'phpTeamNeeds'){

            }
        }
    }
}