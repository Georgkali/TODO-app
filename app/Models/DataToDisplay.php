<?php

namespace App\Models;


class DataToDisplay
{
    private ?array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
        $storage = new Storage();
        foreach ($storage->reader()->getRecords() as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    public function getData(): ?array
    {
        return $this->data;
    }
}