<?php

namespace App;

class Version extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
