<?php

namespace App\Repositories;

use App\Models\Record;
use App\Models\RecordsCollection;
use PDO;
use Ramsey\Uuid\Uuid;

class MysqlRecordsRepository implements RecordsRepository

{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=Todo', 'root', '');
    }

    public function getRecords(): RecordsCollection
    {
        $db = $this->pdo->query('SELECT * FROM todos');
        $db->execute();
        $records = $db->fetchAll(PDO::FETCH_ASSOC);
        $collection = new RecordsCollection();
        foreach ($records as $record) {
            $collection->insertRecord((new Record(
                $record['id'],
                $record['description'],
                $record['completed'] = Record::CREATED
            )));
        }
        return $collection;
    }

    public function addRecord(Record $record)
    {
        $sql = "INSERT INTO todos(id, description, status) VALUES (?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$record->getId() ,$record->getDescription(), $record->getStatus()]);
    }
    public function delete(Record $record) {
        $id = $record->getId();
        //var_dump($id);
        $sql = "DELETE FROM todos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);

    }
}