<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container text-center">
    <h1 class="display-1 mt-5">Tag Edit</h1>
    <div class="my-5">
        <a class="btn btn-primary p-2 g-col-6" href="/products" role="button">Products</a>
    </div>
    <form action="{{ route('tag.update' , ['tag' => $tag]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group">
            <div class="col-sm-2 mt-5 mx-auto">
                <label class="form-label" for="name">Product name:</label>
                <input class="form-control" name="name" id="name" type="text" value='{{ $tag->name }}'/>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mb-3">Update Tag</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
