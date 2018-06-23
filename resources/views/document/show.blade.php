@extends('layouts.master')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-8 box-shadow">
                        <div class="card-body">
                            <h3 class="card-title">{{ $document->title }}</h3>
                            <p class="card-text">{{ $document->content }}</p>
                            @foreach($document->document_tags as $tag)
                                <button type="button" class="btn btn-secondary btn-sm"
                                        disabled>{{ $tag->tag->name }}</button>
                            @endforeach
                            <div class="d-flex justify-content-between align-items-end">
                                <small class="text-muted">Author: {{ $document->user->name }}</small>
                                <small class="text-muted">{{ $document->updated_at->toFormattedDateString() }}</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <a href="/documents/{{$document->id}}/edit">
                                    <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                </a>
                                <a href="/documents/{{$document->id}}/pdf">
                                    <button type="button" class="btn btn-primary btn-sm">Download PDF</button>
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                        data-target="#shareModal">
                                    Share
                                </button>
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


                <!-- Modal -->
                <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shareModalLabel">Share with:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Users
                                            @foreach($users as $user)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                           value="{{$user->id}}" id="defaultCheck1"
                                                           name="users_group">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{ $user->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineForCustomSelect">They can ?</label>
                                            <select class="custom-select mr-sm-2" name="typeShare"
                                                    id="typeShare">
                                                <option selected>Type permission...</option>
                                                <option value="1">Edit</option>
                                                <option value="2">View</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">&nbsp;</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                                <hr>
                                            </div>
                                            <div class="alert alert-success print-success-msg" style="display: none">
                                                <ul></ul>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="shareButton">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myjsscripts')
    <script>
        $(function () {
            $('#shareButton').on('click', function (e) {

                e.preventDefault();

                let typeShare = $('#typeShare').val();
                console.log(typeShare);

                let users = [];
                $("input[name='users_group']:checked").each(function () {
                    users.push($(this).val());
                });
                console.log(users);

                let token = '{{ csrf_token() }}';
                let documentId = {{ $document->id }};

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': token,
                    },
                    type: 'POST',
                    url: '{{ route('share_document') }}',
                    data: {type: typeShare, users: users, document: documentId},
                    dataType: 'json',
                    success: function (data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            printSuccessMsg(['Documento compartido exitosamente!']);
                            var delayInMilliseconds = 1000; //1 second
                            setTimeout(function () {
                            }, delayInMilliseconds);

                            window.location.href = '{{ route('show_document', ['id' => $document->id]) }}';
                        }
                    },
                    error: function (html, status) {
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

            function printSuccessMsg(msg) {
                $(".print-success-msg").find("ul").html('');
                $(".print-success-msg").css('display', 'block');
                $.each(msg, function (key, value) {
                    $(".print-success-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endsection