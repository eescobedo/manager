<?php

namespace App\Repositories;

use App\Version;
use App\Document;

class Versions
{
    public function initial(Document $document)
    {
        Version::create([
            'document_id' => $document->id,
            'version' => 1
        ]);

    }
}