<div class="col-md-3">
    <a href="/documents/{{ $document->id }}">
        <div class="card mb-2 border-primary box-shadow" style="max-width: 15rem; max-height: 25rem;">
            <img class="card-img-top"
                 data-src="holder.js/100px115?theme=social&text={{ $document->title }}"
                 alt="Card image cap">
            <div class="card-body">
                @foreach($document->document_tags as $tag)
                    <button type="button" class="btn btn-secondary btn-sm" disabled>{{ $tag->tag->name }}</button>
                @endforeach
                <div>&nbsp;</div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                    <small class="text-muted">{{ $document->updated_at->toFormattedDateString() }}</small>
                </div>
            </div>
        </div>
    </a>
</div>