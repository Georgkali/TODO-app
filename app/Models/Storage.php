<?php


namespace App\Models;


use League\Csv\Reader;

class Storage
{
    private Reader $reader;


    public function __construct()
    {
        $this->reader = Reader::createFromPath('storage.csv', "r");
    }

    public function reader(): Reader
    {
        return $this->reader;
    }

}