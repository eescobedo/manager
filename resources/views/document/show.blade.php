@extends('layouts.master')

<?php //dd ($document->author()->name); ?>
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {{--<img class="card-img-top"--}}
                    {{--data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"--}}
                    {{--alt="Card image cap">--}}
                    <div class="card mb-8 box-shadow">
                        <div class="card-body">
                            <h3 class="card-title">{{ $document->title }}</h3>
                            <p class="card-text">{{ $document->content }}</p>
                            <div class="d-flex justify-content-between align-items-end">
                                <small class="text-muted">Autor: {{ $document->user->name }}</small>
                                <small class="text-muted">{{ $document->updated_at->toFormattedDateString() }}</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="comments">
                            <ul class="list-group">
                                @foreach($document->versions as $version)
                                    <li class="list-group-item">
                                        <strong>{{ $version->created_at->diffForHumans() }}</strong>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection