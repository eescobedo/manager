<?php

namespace App;

class Document extends Model
{
    public function versions()
    {
        return $this->hasMany(Version::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
