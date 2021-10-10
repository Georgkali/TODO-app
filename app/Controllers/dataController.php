<?php

namespace App\Controllers;


use App\Models\Record;
use App\Repositories\MysqlRecordsRepository;
use Ramsey\Uuid\Uuid;

class dataController
{
    private MysqlRecordsRepository $records;

    public function __construct()
    {
        $this->records = new MysqlRecordsRepository();
    }

    public function index()
    {

        $records = $this->records->getRecords()->getRecords();
        require_once 'app/Views/user.template.php';
    }

    public function addRecord()

    {
        var_dump("I was here");
        $this->records->addRecord(new Record(
            Uuid::uuid4(),
            $_POST['description'],
            Record::CREATED));
        require_once 'app/Views/user.template.php';
        header("location: /");
    }

    public function delete()
    {
        foreach ($this->records->getRecords()->getRecords() as $record) {
            if ($record->getId() == $_POST['id']) {
                echo "{$record->getDescription()}";
                $this->records->delete($record);
            };
        }
        header("location: /");
    }
}