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
    <form action="{{ route('registration.register') }}" method="post">
        @csrf
        @method('POST')
        <div class="col-sm-3 mt-5 mx-auto">
            <label class="form-label" for="name">Username:</label>
            <input class="form-control" name="name" id="name" type="text"/><br/>
        </div>

        <div class="col-sm-3 mx-auto">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" name="email" id="email" type="text"/><br/>
        </div>

        <div class="col-sm-3 mx-auto">
            <label class="form-label" for="password">Password:</label>
            <input class="form-control" name="password" id="password" type="text"/><br/>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>

    <form action="/" method="get">
        <button type="submit" class="btn btn-secondary">Back</button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
