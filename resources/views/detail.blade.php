<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/show2.css">

    <title>Document</title>
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="cart-cars">
        <div class="">
            <img class="img" src="/image/{{ $cars_detail->image }}" alt="...">
        </div>
        <div class="cart-content">
            <p>{{ $cars_detail->name }}</p>
            <p>Price: {{ $cars_detail->price }}</p>
            <p>Manufacture: {{ $cars_detail->mf->mf_name }}</p>
        </div>
    </div>
</body>
</html>
