<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Blocks</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 4rem;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="">Blogs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item active">
                    <a class="nav-link">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('logout')}}">Logout <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post')}}">Post Blog</a>
                </li>
                @endauth

                @guest
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post')}}">Post Blog</a>
                </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Blogs</h1>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong style="font-size: 1.5rem;">{{ $post->title }}</strong></h5>
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                    <div class="card-footer">
                        @if (Auth::id() === $post->user_id)
                        <a href="{{route('post.view', $post->id)}}" class="btn btn-primary btn-sm mx-auto">View</a>
                        @endif
                        <br>
                        <small class="text-muted">Created: {{ $post->created_at->format('Y-m-d H:i:s') }}</small><br>
                        <small class="text-muted">Updated: {{ $post->updated_at->format('Y-m-d H:i:s') }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item"><a class="page-link" href="">2</a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="">Next</a>
                </li>
            </ul>
        </nav> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>