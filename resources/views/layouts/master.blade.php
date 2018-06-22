<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/favicon.ico">

    <title>Document Manager</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/album.css" rel="stylesheet">
    <link href="/css/bootstrap-tags.css" rel="stylesheet">
</head>

<body>
@include('layouts.nav')

<div id="app">

    <main role="main">

        {{--<section class="jumbotron text-center">--}}
        {{--<div class="container">--}}
        {{--<h1 class="jumbotron-heading">Album example</h1>--}}
        {{--<p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>--}}
        {{--<p>--}}
        {{--<a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
        {{--<a href="#" class="btn btn-secondary my-2">Secondary action</a>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</section>--}}

        <div class="album py-5 bg-light">

            @yield('content')
            {{--<div class="container">--}}

            {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="card mb-4 box-shadow">--}}
            {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">--}}
            {{--<div class="card-body">--}}
            {{--<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
            {{--<div class="d-flex justify-content-between align-items-center">--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
            {{--</div>--}}
            {{--<small class="text-muted">9 mins</small>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{----}}
            {{--</div>--}}
            {{--</div>--}}
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting
                    started guide</a>.</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"--}}
            {{--integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"--}}
            {{--crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"--}}
            {{--integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"--}}
            {{--crossorigin="anonymous"></script>--}}
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
     {{--<script src="../../assets/js/vendor/holder.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    {{--<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>--}}
    {{--<script src="https://rawgit.com/twitter/typeahead.js/master/dist/bloodhound.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>--}}

    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>--}}

    <script src="{{ mix('js/app.js') }}"></script>

    @yield('myjsscripts')
</div>
</body>
</html>
