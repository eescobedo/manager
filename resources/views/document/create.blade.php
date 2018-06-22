@extends('layouts.master')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Create Document</h1>

                    <hr>

                    <form method="POST" action="/documents">
                        {{ csrf_field() }}
                        <input type="hidden" name="format" value="0">
                        <input type="hidden" name="permissions" value="1">

                        <div class="form-group">
                            <label for="title">T&iacute;tulo</label>
                            <input type="text" class="form-control" id="title" placeholder="T&iacute;tle" name="title">
                        </div>
                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            {{--<input type="text" class="form-control" id="tags"name="tags">--}}
                            <div id="tags" class="tag-list"></div>
                        </div>

                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea class="form-control" id="content" placeholder="Contenido"
                                      name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>

                        @include('layouts.errors')
                    </form>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
@section ('myjsscripts')
    <script>
        $(function() {
            // If using Bootstrap 2, be sure to include:
            // Tags.bootstrapVersion = "2";
            $('#tags').tags({
                tagData:["boilerplate", "tags"],
//                excludeList:["not", "these", "words"]
            });
        });
    </script>
@endsection