<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin: 50px 100px;">
    <div class = "container" style="margin: 0 0 20px;">
        <h3>Current user: {{ auth()->user()->name }}</h3>
        <a class="btn btn-primary btn-lg" href="{{ route('product.create')}}" role="button">Create product</a>
        <a class="btn btn-success btn-lg" href="{{ route('logout') }}" role="button">Logout</a>
        @if($role == 'admin')
            <a class="btn btn-primary btn-lg" href="{{ route('register.page')}}" role="button">Register new user</a>
        @endif
    </div>
<ul class="list-group">
@foreach($products as $product)
        <li class="list-group-item">
            <div class="container">
                <p class="product-owner">Owner: {{ $product->user->name }}</p>
                <p class="product-name">Name: {{ $product->name }}</p>
                <p class="product-price">Price: ${{ $product->price }}</p>
                <p class="product-info">Information: {{ $product->info }}</p>
                <a class="btn btn-primary" href="{{ route('product.edit', ['id'=>$product->id]) }}" role="button">Edit</a>
                <a class="btn btn-danger" href="{{ route('product.delete', ['id'=>$product->id]) }}" role="button">Delete</a>
            </div>
        </li>
@endforeach
</ul>
    {{ $products->links() }}
</div>

</body>
