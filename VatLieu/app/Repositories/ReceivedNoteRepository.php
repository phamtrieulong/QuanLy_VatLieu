<?php

namespace App\Repositories;

use App\Models\ReceivedNote;

class ReceivedNoteRepository
{
    protected $receivednote;

    public function __construct(ReceivedNote $receivednote)
    {
        $this->receivednote = $receivednote;
    }

    public function create($attributes)
    {
        $this->receivednote->create($attributes);
    }

    public function update($attributes)
    {
        $this->receivednote->create($attributes);
    }
}