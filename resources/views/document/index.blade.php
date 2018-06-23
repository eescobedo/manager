@extends('layouts.master')

@section('content')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($documents as $document)
                    @include('document.single')
                @endforeach
            </div>
            @if(isset($shared) && count($shared) > 0)
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Shared documents</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($shared as $document)
                        @include('document.shared')
                    @endforeach
                </div>
            @endif
        </div>

@endsection
