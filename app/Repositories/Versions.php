<?php

namespace App\Repositories;

use App\Document;
use App\Version;

class Versions
{
    public function initial(Document $document)
    {
        Version::create([
            'document_id' => $document->id,
            'version' => 1
        ]);
    }

    public function increment(Document $document)
    {
        $version = Version::where('document_id', '=', $document->id)->latest()->first();
        Version::create([
                'document_id' => $document->id,
                'version' => $version->version + 1
            ]
        );
    }
}