<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container text-center">
    <h1 class="display-1 mt-5">Products</h1>
    <div class="my-5">
        <a class="btn btn-primary p-2 g-col-6" href="/profile" role="button">Profile</a>
        <a class="btn btn-primary p-2 g-col-6" href="/products" role="button">Products</a>
    </div>
    <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="input-group">
            <div class="col-sm-2 mt-5 mx-auto">
                <label class="form-label" for="name">Product name:</label>
                <input class="form-control" name="name" id="name" type="text"/>
            </div>
            <div class="col-sm-2 mt-5 mx-auto">
                <label class="form-label" for="sku">Sku:</label>
                <input class="form-control" name="sku" id="sku" type="text"/>
            </div>
            <div class="col-sm-2 mt-5 mx-auto">
                <label class="form-label" for="price">Price:</label>
                <input class="form-control" name="price" id="price" type="text"/>
            </div>
            <div class="col-sm-2 mt-5 mx-auto">
                <label class="form-label" for="amount">Amount:</label>
                <input class="form-control" name="amount" id="amount" type="text"/>
            </div>
            <div class="col mt-5 mx-auto">
                <label for="images" class="form-label">Image:</label>
                <input class="form-control" name="images[]" type="file" id="image" multiple/>
            </div>
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="tags[]" type="checkbox" id="tagCheckBox" value="{{ $tag->id }}">
                    <label class="form-check-label" for="tagCheckBox">{{ $tag?->name }}</label>
                </div>
            @endforeach
            <div>
                <button type="submit" class="btn btn-primary mb-3">Create Product</button>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
