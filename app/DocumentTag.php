<?php

namespace App;

class DocumentTag extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
