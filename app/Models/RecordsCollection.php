<?php

namespace App\Models;

use App\Models\Record;

class RecordsCollection
{
    private ?array $records;

    public function __construct(array $records = [])
    {
        $this->records = $records;
    }

    public function insertRecord(Record $record)
    {
        $this->records[] = $record;
    }

    public function getRecords(): ?array
    {
        return $this->records;
    }
}