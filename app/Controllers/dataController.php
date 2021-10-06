<?php

namespace App\Controllers;


use App\Models\DataToDisplay;

class dataController
{
    public function index() {
        $data = new DataToDisplay();
        $data = $data->getData();
        require_once 'app/Views/user.template.php';
    }

}