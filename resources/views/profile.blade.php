<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <h1 class="display-1 mt-5">Profile</h1>
    <div class="my-5">
        <a class="btn btn-secondary p-2 g-col-6" href="/" role="button" >To Main Page</a>
        <a class="btn btn-primary p-2 g-col-6" href="/logout" role="button">Logout</a>
        <a class="btn btn-primary p-2 f-col-6" href="/products" role="button">Products</a>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show', ['model' =>'Product']) }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show', 'Shop') }}">Shops</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="{{ route('profile.showByTag') }}" method="get">
                    @csrf
                    @method('GET')
                    <input class="form-control me-2" type="search" name="tag" placeholder="Search by tag" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
@foreach($items as $item)
    <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
            @if(method_exists($item,'images'))
            <img src="{{ url('storage/images/'.$item->images()->first()?->name) }}" class="card_img-top" alt="card-img">
            @endif
            <div class="card-body">
                <h5 class="card-title">Category:{{ class_basename($item) }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">name:{{ $item->name }}</h6>
                @foreach($item->tags()->get() as $tag)
                <p class="card-text">{{ $tag->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
