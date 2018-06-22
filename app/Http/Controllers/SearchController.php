<?php

namespace App\Http\Controllers;

use App\Repositories\Documents;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @var Documents
     */
    private $documents;

    /**
     * SearchController constructor.
     */
    public function __construct(Documents $documents)
    {
        $this->middleware('auth');
        $this->documents = $documents;
    }

    public function run()
    {
        // Create functionality for search
        $documents = $this->documents->search(request()->get('q'));

        return view('document.index', compact('documents'));
    }

}
