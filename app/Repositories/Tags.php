<?php

namespace App\Repositories;

use App\Tag;
use App\Document;
use App\DocumentTag;

class Tags
{
    /**
     * @var Tag
     */
    private $tag;
    /**
     * @var DocumentTag
     */
    private $documentTag;


    /**
     * Tags constructor.
     */
    public function __construct(Tag $tag, DocumentTag $documentTag)
    {
        $this->tag = $tag;
        $this->documentTag = $documentTag;
    }

    public function assign(Document $document, array $tags)
    {
        foreach ($tags as $tag) {
            $tagSearch = $this->tag->where('name', '=', strtolower($tag))->first();

            if (!$tagSearch) {
                $tagSearch = $this->tag->create(['name' => $tag]);
            }

            $this->documentTag->create([
                'document_id' => $document->id,
                'tag_id' => $tagSearch->id
            ]);
        }
    }
}