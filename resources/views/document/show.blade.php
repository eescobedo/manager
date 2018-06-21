@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <h1>{{ $document->title }}</h1>
        <hr>
        <div class="card mb-8">
            {{--<img class="card-img-top"--}}
                 {{--data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"--}}
                 {{--alt="Card image cap">--}}
            <div class="card-body">

                    <p class="card-text">{{ $document->content }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    {{--<div class="btn-group">--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                        {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                    {{--</div>--}}
                    <small class="text-muted">{{ $document->updated_at->toFormattedDateString() }}</small>
                </div>
            </div>
        </div>
    </div>

@endsection