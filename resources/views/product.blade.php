<h1>Products</h1>
<hr>
<ul>
    @if (count($products))
        @foreach ($products as $product)
        <li>{{$product->name}}</li>
        @endforeach

    @else<p>No Products</p>
    @endif
</ul>
<form action="/admin/products/create" method="post" enctype="multipart/form-data">
    @csrf
    <input name="name" type="text" placeholder="name">
    <input name="price" type="number" placeholder="price">
    <input name="category" type="text" placeholder="category">
    <input name="description" type="text" placeholder="description">
    <input name="quantity" type="number" placeholder="quantity">
    <input name="image_path" type="text" value="hgdhdwby" placeholder="Upload image">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>

