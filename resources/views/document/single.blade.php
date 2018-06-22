<div class="col-md-4">
    <a href="/documents/{{ $document->id }}">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top"
                 data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text={{ $document->title }}"
                 alt="Card image cap">
            <div class="card-body">
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


<!--<div class="panel panel-default" v-for="document in documents">-->
<!--<div class="panel-heading">{ { document.title }}</div>-->

<!--<div class="panel-body">-->
<!--{!-- document.content --!}-->
<!--</div>-->
<!--<div class="panel-footer">-->
<!--soy el footer-->
<!--</div>-->
<!--</div>-->
