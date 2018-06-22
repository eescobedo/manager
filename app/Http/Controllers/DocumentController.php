<?php

namespace App\Http\Controllers;

use PDF;
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
        $newTags = [];
        $myTags = [];

        foreach ($document->document_tags as $tag) {
            $myTags[] = $tag->tag->name;
        }

        $tags = Tag::latest()
            ->whereNotIn('name', $myTags)
            ->select('name')->get();

        foreach ($tags as $tag) {
            $newTags[] = $tag->name;
        }

        return view('document.edit', ['document' => $document, 'tags' => $myTags, 'newTags' => $newTags]);
    }

    public function update()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'tags' => 'required|array',
            'content' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $this->user->modifyPublish(request());

        return response()->json(['status' => 'Document updated!']);
    }

    public function generate(Document $document)
    {
        $data = ['title' => $document->title, 'content' => $document->content];

        $name = str_random(30) . '.pdf';
        $pdf = PDF::loadView('document.pdfView', $data);

        return $pdf->download($name);
    }
}
