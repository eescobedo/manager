<?php

namespace App\Http\Controllers;

use App\Document;
use App\Repositories\Documents;
use App\Version;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * @var Documents
     */
    private $documents;

    /**
     * DocumentController constructor.
     */
    public function __construct(Documents $documents)
    {
        $this->middleware('auth');
        $this->documents = $documents;
    }

    public function index()
    {
        $documents = $this->documents->all(Auth::id());

        return view('document.index', compact('documents'));
    }

    public function show(Document $document) // Document:: find(wildcard);
    {
        return view('document.show', compact('document'));
    }

    public function create()
    {
        return view('document.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'tags' => 'required',
            'content' => 'required'
        ]);

        $document = auth()->user()->publish(
            new Document(request(['title', 'tags', 'content', 'format', 'permissions']))
        );

        Version::create([
            'document_id' => $document->id,
            'version' => 1
        ]);

        return redirect('/');
    }

    public function edit(Document $document)
    {
        return view ('document.edit', compact('document'));

    }

    public function update()
    {
        dd (request());
    }
}
