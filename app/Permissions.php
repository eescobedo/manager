<?php

namespace App;

class Permissions extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
