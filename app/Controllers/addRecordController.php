<?php

namespace App\Controllers;

use App\Models\DataToDisplay;
use League\Csv\Writer;

class addRecordController
{
    public function index()
    {
        $writer = Writer::createFromPath("storage.csv", 'r+');
        $data = new DataToDisplay();
        $data = $data->getData();
        var_dump($data);
        $data[] = [$_POST['item']];
        var_dump($data);
        $writer->insertAll($data);
        header("location: /");
    }
}