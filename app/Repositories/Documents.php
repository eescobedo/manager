<?php

namespace App\Repositories;

use App\Document;
use App\Permissions;

class Documents
{
    public function all(int $userId)
    {
        return Document::where('user_id', '=', $userId)->orderBy('updated_at', 'desc')->get();
    }

    public function allShared(int $userId)
    {
        $permissions = Permissions::where('user_id', '=', $userId)->select('document_id')->get();

        return Document::whereIn('id', $permissions->pluck('document_id')->toArray())->orderBy('updated_at', 'desc')->get();
    }

    public function search($queryToSearch)
    {
        $documents = Document::where('user_id', '=', auth()->user()->id)
            ->where('title', 'LIKE', '%'. $queryToSearch . '%')
            ->orWhere('content', 'LIKE', '%'. $queryToSearch . '%')

            ->join('users', 'documents.user_id', '=', 'users.id')
            ->orWhere('users.name', 'LIKE', '%'. $queryToSearch . '%')

            ->leftJoin('document_tags', 'documents.id', '=', 'document_id')
            ->leftJoin('tags', 'tags.id', '=', 'document_tags.tag_id')
            ->orWhere('tags.name', 'LIKE', '%' . $queryToSearch . '%')

            ->orderBy('documents.updated_at', 'desc')
            ->select('documents.id', 'documents.title', 'documents.content', 'documents.updated_at')
            ->distinct()
            ->get();

        return $documents;
    }
}
