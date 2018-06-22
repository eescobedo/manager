<?php

namespace App\Http\Controllers\Api;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentResource;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(20);
        return DocumentResource::collection($documents);
    }

    public function show(Document $document)
    {
        return new DocumentResource($document);
    }

    public function store(Request $request)
    {

        $document = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $document = Document::create($document);

        return new DocumentResource($document);
    }
}
