
    <div class="col-md-4">
        <a href="/documents/{{ $document->id }}">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top"
                 data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text={{ $document->title }}"
                 alt="Card image cap">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">

                        {{--<p class="card-text">{{ $document->title }}</p>--}}

                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>


                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                    </div>
                    <small class="text-muted">{{ $document->updated_at->toFormattedDateString() }}</small>
                </div>
            </div>
        </div>
        </a>
    </div>
