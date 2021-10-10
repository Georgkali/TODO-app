<?php

namespace App\Models;


class Record
{
    private string $id;
    private string $description;
    private string $status;
    public const CREATED = "created";
    public const COMPLETED = "completed";


    public function __construct(string $id, string $description, string $status)
    {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public function getStatus(): string
    {
        return $this->status;
    }
}