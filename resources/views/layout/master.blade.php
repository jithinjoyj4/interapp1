<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel Interapp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-1 margin-tb">
                <a class="" href="{{ route('home') }}"> Home</a>
            </div>
            <div class="col-lg-1 margin-tb">
                <a class="" href="{{ route('products.create') }}"> Cart</a>
            </div>
        </div>
    </div>

    @yield('content')
</body>

</html>