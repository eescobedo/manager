<?php

namespace App\Http\Controllers;

use App\Tag;
use Validator;
use App\Document;
use App\Repositories\Users;
use App\Repositories\Documents;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * @var Documents
     */
    private $documents;
    /**
     * @var Users
     */
    private $user;

    /**
     * DocumentController constructor.
     * @param Documents $documents
     * @param Users $user
     */
    public function __construct(Documents $documents, Users $user)
    {
        $this->middleware('auth');
        $this->documents = $documents;
        $this->user = $user;
    }

    public function index()
    {
        $documents = $this->documents->all(Auth::id());

        return view('document.index', compact('documents'));
    }

    public function show(Document $document) // Document:: find(wildcard);
    {
//        echo '<pre>';
//        foreach ($document->document_tags as $tag)
//        {
////            dd($tag->tag->name);
//        }
//        dd ('die');
//        dd ($document->tags());
        return view('document.show', compact('document'));
    }

    public function create()
    {
        $newTags = [];
        $tags = Tag::latest()->select('name')->get();

        foreach ($tags as $tag) {
            $newTags[] = $tag->name;
        }

        return view('document.create', ['tags' => $newTags]);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'tags' => 'required|array',
            'content' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->user->publish(request());

        return response()->json(['status' => 'Document created!']);
    }

    public function edit(Document $document)
    {
        return view('document.edit', compact('document'));

    }

    public function update()
    {
        dd(request());
    }
}
