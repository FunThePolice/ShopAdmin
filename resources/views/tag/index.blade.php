<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <div class="my-5">
        <a class="btn btn-secondary p-2 g-col-6" href="/profile" role="button" >Profile</a>
        <a class="btn btn-primary p-2 g-col-6" href="/shops" role="button">Shops</a>
        <a class="btn btn-primary p-2 f-col-6" href="/products" role="button">Products</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Controls</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{$tag->name}}</th>
                <th scope="row">
                    <form id="tag-edit" method="get" action="{{ route('tag.edit', ['tag' => $tag]) }}">
                        @method('GET')
                        @csrf
                        <button class="btn btn-primary">Edit</button>
                    </form>
                    <form id="tag-delete" method="post" action="{{ route('tag.delete', ['tag' => $tag])}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary p-2 f-col-6" href="tags/create" role="button">Add New</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
