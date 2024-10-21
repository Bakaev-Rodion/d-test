<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin: 50px 100px;">
<form action="{{ isset($product->id) ? route('product.edit',['id'=>$product->id]) : route('product.create') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" name="productName" class="form-control" id="productName" placeholder="Enter product name" value="{{ (isset($product) && $product->name) ? $product->name : old('productName')}}">
    </div>
    <div class="form-group">
        <label for="productPrice">Product Price</label>
        <input type="text" name="productPrice" class="form-control" id="productPrice" placeholder="Price" value="{{ (isset($product) && $product->price) ? $product->price : old('productPrice')}}">
        <small class="form-text text-muted">Price could be only integer or float with one/two figures after dot. Example: "123","123.45"</small>
    </div>
    <div class="form-group">
        <label for="productInfo">Example textarea</label>
        <textarea class="form-control" name="productInfo" id="productInfo" rows="3" >{{ (isset($product) && $product->info) ? $product->info : old('productInfo')}}</textarea>
    </div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $key=>$error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
