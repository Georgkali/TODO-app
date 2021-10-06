<?php

namespace App\Controllers;

use App\Models\DataToDisplay;
use League\Csv\Writer;

class DeleteRecordController
{
    public
    function index()
    {

        $data = new DataToDisplay();
        $data = $data->getData();
        var_dump($data[$_POST['itemToDelete']]);
        unset($data[$_POST['itemToDelete']]);
        echo "<pre>";
        var_dump($data);
        echo "<pre>";
        $writer = Writer::createFromPath("storage.csv", "w");
        $writer->insertAll($data);
        header("location: /");
    }
}