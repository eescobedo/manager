<?php

namespace App\Http\Controllers;

use App\Document;

class DocumentController extends Controller
{
    /**
     * DocumentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $documents = Document::latest()->get();

        return view('document.index', compact('documents'));
    }

    public function show(Document $document) // Document:: find(wildcard);
    {
        return view('document.show', compact('document'));
    }

    public function create()
    {
        $documents = Document::all();
        return view('document.create', compact('documents'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required'
        ]);

        Document::create([
            'title' => request('title'),
            'tags' => request('tags'),
            'content' => request('content'),
            'format' => 0,
            'author_id' => 3,
            'permissions' => 32,
            'versions' => 322
        ]);

        // for include all parameters
        // Document::create(request()->all());

        return redirect('/');
    }
}
