@extends('layouts.master')


@section('content')

    <div class="col-sm-8">
        <h1>Create Document</h1>

        <hr>

        <form method="POST" action="/documents">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">T&iacute;tulo</label>
                <input type="text" class="form-control" id="title" placeholder="T&iacute;tle" name="title">
            </div>
            <div class="form-group">
                <label for="tags">Etiquetas</label>
                <input type="text" class="form-control" id="tags" placeholder="Etiquetas" name="tags">
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea class="form-control" id="content" placeholder="Contenido" name="content"></textarea>
            </div>
            {{--<div class="form-group">--}}
            {{--<label for="exampleInputPassword1">Password</label>--}}
            {{--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="exampleInputFile">File input</label>--}}
            {{--<input type="file" id="exampleInputFile">--}}
            {{--<p class="help-block">Example block-level help text here.</p>--}}
            {{--</div>--}}
            {{--<div class="checkbox">--}}
            {{--<label>--}}
            {{--<input type="checkbox"> Check me out--}}
            {{--</label>--}}
            {{--</div>--}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

            @include('layouts.errors')
        </form>
    </div>

    <hr>

@endsection