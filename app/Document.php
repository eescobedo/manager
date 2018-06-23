<?php

namespace App;

class Document extends Model
{
    public function versions()
    {
        return $this->hasMany(Version::class)->orderBy('updated_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }

    public function document_tags()
    {
        return $this->hasMany(DocumentTag::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permissions::class);
    }


}
