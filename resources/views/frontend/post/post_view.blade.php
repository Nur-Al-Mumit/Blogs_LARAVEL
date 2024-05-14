<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            max-width: 600px;
            /* Set max-width */
            margin: 0 auto;
            /* Center the card horizontally */
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            /* Center the title */
        }

        .card-text {
            font-size: 18px;
            color: #555;
            text-align: center;
            /* Center the text */
        }

        .card img {
            width: 350px;
            /* Set the image width */
            display: block;
            margin: 0 auto;
            /* Center the image */
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 15px;
            text-align: center;
            /* Center the buttons */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post[0]->title }}</h2>
                        <p class="card-text">{{ $post[0]->content }}</p>
                        @if($post[0]->image)
                        <img  height="150" src="{{ asset('/uploads/' . $post[0]->image) }}" alt="Post Picture">
                        @endif
                    </div>
                    <div class="card-footer">
                        @if (Auth::id() === $post[0]->user_id)
                        <!-- Update button -->
                        <a href="{{route('edit.post', $post[0]->id)}}" class="btn btn-primary btn-sm me-2">Update</a>
                        <!-- Delete button -->
                        <a href="{{route('post.delete', $post[0]->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>