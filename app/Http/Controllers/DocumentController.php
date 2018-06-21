<?php

namespace App\Http\Controllers;

use App\Document;
use App\Version;
use Illuminate\Support\Facades\Auth;

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
        $documents = Document::where('user_id', '=', Auth::id())->latest()->get();

        return view('document.index', compact('documents'));
    }

    public function show(Document $document) // Document:: find(wildcard);
    {
//        dd ($document);
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

//        dd (request());
        $document = auth()->user()->publish(
            new Document(request(['title', 'tags', 'content', 'format', 'permissions']))
        );

//        dd ($document);

//        $document = Document::create([
//            'title' => request('title'),
//            'tags' => request('tags'),
//            'content' => request('content'),
//            'format' => 0,
//            'author_id' => Auth::id(),
//            'permissions' => 32,
//        ]);

//        $versionNumber = Version::where('document_id', '=' , $document->id)->orderBy('id', 'desc')->take(1)->get();

//        if ($versionNumber->isEmpty()){
            Version::create([
                'document_id' => $document->id,
                'version' => 1
            ]);
//        }


        // for include all parameters
        // Document::create(request()->all());

        return redirect('/');
    }
}
