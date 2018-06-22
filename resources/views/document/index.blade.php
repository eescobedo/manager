@extends('layouts.master')

@section('content')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($documents as $document)
                    @include('document.single')
                @endforeach
                {{--<div class="col-md-12">--}}
                    {{--<documents></documents> <!-- In index.blade.php -->--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection
