<?php

class Model
{
    //change this depending on database you need
    public function __construct()
    {
        $this->db = new Database();
//        $this->db = new Json();
    }
}