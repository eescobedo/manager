<?php

namespace App\Http\Controllers\Api;

use App\Document;
use App\Http\Controllers\Controller;

class VersionDocument extends Controller
{
    // for review document with versions
    public function update(Document $document)
    {
        $document->versions();
        return $document;
    }
}
