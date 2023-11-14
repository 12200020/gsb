<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 0;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
</head>
<body style="background-color: #f5f5f5; padding: 0; margin: 0; 
font-family: Arial, sans-serif;">

    @include('admin.nav')
    
    <div style="padding: 2rem; margin: 0 20rem 0 20rem; ">

    <h1 style="margin-bottom: 20px;">Add a Product</h1>

    <form method="POST" action="{{ route('products.add') }}" enctype="multipart/form-data" style="margin-bottom: 20px;">
        @csrf {{-- Cross-site Request Forgery protection --}}
        <label for="name" style="font-weight: bold;">Product Name:</label>
        <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <input type="hidden" id="post_by" name="post_by" value="{{ auth()->id() }}">
        <br>

        <label for="price" style="font-weight: bold;">Price:</label>
        <input type="number" id="price" name="price" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"><br>

        <label for="description" style="font-weight: bold;">Description:</label><br>
        <textarea id="description" name="description" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea><br>

        <label for="image" style="font-weight: bold;">Image:</label>
        <input type="file" id="image" name="image" style="margin-bottom: 20px;"><br>

        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Add Product</button>
    </form>

    <h1 style="margin-bottom: 20px;">All Products</h1>

    <ul style="list-style: none; padding: 0;">
        @foreach($products as $product)
            <li style="background-color: #fff; padding: 15px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 10px;">
                <strong style="font-weight: bold;">Name:</strong> {{ $product->name }}<br>
                <strong style="font-weight: bold;">Price:</strong> ${{ $product->price }}<br>
                <strong style="font-weight: bold;">Description:</strong> {{ $product->description }}<br>
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 200px; margin-top: 10px; border: 1px solid #ccc; border-radius: 4px;">
                @endif
            </li>
            <br>
        @endforeach
    </ul>

    </div>

</body>
</html>
