<h1>Categories</h1>
<hr>
<ul>
    @if (count($categories))
        @foreach ($categories as $category)
        <li>{{$category->name}}</li>
        @endforeach

    @else<p>No Categories</p>
    @endif
</ul>
<form action="/admin/products/categories/create" method="post" enctype="multipart/form-data">
    @csrf
    <input name="name" type="text" placeholder="name">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
