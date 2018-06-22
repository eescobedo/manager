@extends('layouts.master')


@section('content')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <h1>Update Document</h1>

                    <hr>

                    <form method="POST" action="/documents">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="format" value="0">
                        <input type="hidden" name="permissions" value="1">

                        <div class="form-group">
                            <label for="title">T&iacute;tulo</label>
                            <input type="text" class="form-control" id="title" placeholder="T&iacute;tle" name="title"
                                   value="{{$document->title}}">
                        </div>
                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <input type="text" class="form-control" id="tags" placeholder="Etiquetas" name="tags"
                                   value="{{$document->tags}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea class="form-control" id="content" placeholder="Contenido"
                                      name="content">{{ $document->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        @include('layouts.errors')
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection