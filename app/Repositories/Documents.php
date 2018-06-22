<?php

namespace App\Repositories;

use App\Document;

class Documents
{
    public function all(int $userId)
    {
        return Document::where('user_id', '=', $userId)->latest()->get();
    }
}
