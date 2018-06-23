@extends('layouts.master')


@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <h1>Update Document</h1>
                    <hr>

                    <form id="updateDocument">
                        {{ csrf_field() }}
                        <input type="hidden" name="format" value="0">

                        <div class="form-group">
                            <label for="title">T&iacute;tulo</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                                   value="{{$document->title}}">
                        </div>
                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <div id="tags" class="tag-list" placeholder="Etiquetas" name="tags"></div>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenido</label>
                            <textarea class="form-control" id="content" placeholder="Contenido"
                                      name="content">{{ $document->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="submit">Update</button>
                        </div>

                        @include('layouts.errors')
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section ('myjsscripts')
    <script>
        $(function () {
            let tagsElements = {!!  json_encode($tags) !!};
            let newElements = {!! json_encode($newTags) !!}
                let
            tagsContent = $('#tags').tags({
                tagData: tagsElements,
                suggestions: newElements,
                propmtText: "Tags..."
            });

            $('#submit').on('click', function (e) {
                e.preventDefault();

                let token = '{{ csrf_token() }}';
                let title = $('#title').val();
                let tags = tagsContent.getTags();
                let content = $('#content').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    type: 'PUT',
                    url: '{{ route('update_document', ['id' => $document->id]) }}',
                    data: {title: title, tags: tags, content: content},
                    dataType: 'json',
                    success: function (data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            window.location.href = '{{ route('show_document', ['id' => $document->id]) }}';
                        }
                    },
                    error: function (html, status) {

                        console.log(html);
                        console.log(status);
                    }
                });
            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endsection