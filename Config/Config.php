<?php

namespace Config;

class Config
{

    public function __construct(){
        $this->config = [
            'dbHost' => 'localhost',
            'dbPort' => '888ç',
            'dbName' => 'association_animaux',
            'dbUser' =>  'root',
            'dbPassword' => 'root'
        ];
    }

    public function getConfig(){
        return $this->config;
    }
    
}