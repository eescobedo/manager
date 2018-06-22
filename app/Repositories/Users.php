<?php

namespace App\Repositories;

use App\Document;
use Illuminate\Http\Request;

class Users
{
    /**
     * @var Versions
     */
    private $versions;
    /**
     * @var Tags
     */
    private $tags;


    /**
     * Users constructor.
     * @param \App\Repositories\Versions $versions
     * @param Tags $tags
     */
    public function __construct(Versions $versions, Tags $tags)
    {
        $this->tags = $tags;
        $this->versions = $versions;
    }

    public function publish(Request $request)
    {
        $document = auth()->user()->publish(new Document($request->only('title', 'content')));

        $this->versions->initial($document);

        $this->tags->assign($document, $request['tags']);

        return $document;
    }
}