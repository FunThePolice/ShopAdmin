<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <div class="my-5">
        <a class="btn btn-secondary p-2 g-col-6" href="/profile" role="button" >Profile</a>
        <a class="btn btn-primary p-2 g-col-6" href="/tags" role="button">Tags</a>
        <a class="btn btn-primary p-2 f-col-6" href="/products" role="button">Products</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Tags</th>
            <th scope="col">Controls</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $shop)
            <tr>
                <th scope="row">{{ $shop->name }}</th>
                <th scope="row" class="col-2">
                    <div id="imageCarousel" class="carousel carousel-dark slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('storage/images/'.$shop->images()->first()?->name) }}" alt="Image" class="img-fluid">
                            </div>
                            @foreach($shop->images()->get() as $image)
                                <div class="carousel-item">
                                    <img src="{{ url('storage/images/'.$image?->name) }}" class="img-thumbnail" width="300" height="250" alt="image">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </th>
                <th>
                    <ul class="nav justify-content-center">
                        @foreach($shop->tags as $tag)
                            <li class="nav-item">
                                <a class="nav-link" href="shops/{ {{ $tag?->name }} }">{{ $tag?->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </th>
                <th scope="row">
                    <form id="shop-edit" method="get" action="{{ route('shop.edit', ['shop' => $shop]) }}">
                        @method('GET')
                        @csrf
                        <button class="btn btn-primary">Edit</button>
                    </form>
                    <form id="tag-delete" method="post" action="{{ route('shop.delete', ['shop' => $shop]) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary p-2 f-col-6" href="shops/create" role="button">Add New</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
