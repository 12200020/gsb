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
            width: 0;
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        /* session alert */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: smaller;
        }

        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }

        .alert.alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }

        /* Responsive layout */
        @media only screen and (max-width: 600px) {
            body {
                padding: 0;
            }

            div {
                margin: 0;
            }

            form, ul {
                width: 100%;
            }

            h1 {
                font-size: 1.5rem;
            }

            li {
                flex-direction: column;
            }

            button {
                width: 100%;
            }

            /* Adjust padding and margin for the outer div */
            div {
                padding: 1rem;
                margin: 0;
            }
        }

        /* Center content */
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #f5f5f5; padding: 0; margin: 0; font-family: Arial, sans-serif;">

    @include('admin.nav')
    
    <div class="center" style="padding: 2rem; margin: 0 auto; max-width: 800px;">

        <h1 style="margin-bottom: 20px;">Add a Product</h1>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('products.add') }}" enctype="multipart/form-data" style="margin-bottom: 20px; width: 100%;">
            @csrf {{-- Cross-site Request Forgery protection --}}
            <label for="name" style="font-weight: bold;">Product Name:</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <input type="hidden" id="post_by" name="post_by" value="{{ auth()->id() }}">
            <br>

            <label for="price" style="font-weight: bold;">Price:</label>
            <input type="number" id="price" name="price" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"><br>

            <label for="description" style="font-weight: bold;">Description:</label><br>
            <textarea id="description" name="description" required style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea><br>

            <div style="margin-bottom: 20px;">
                <label for="image" style="font-weight: bold; display: block; margin-bottom: 5px;">Image:</label>
                <input type="file" id="image" name="image" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; width: 100%;">
            </div>

            <button type="submit" style="padding: 10px 20px; color: white; background:#4CAF50; border: none; border-radius: 4px; cursor: pointer;">Add Product</button>
        </form>

        <hr>

        <h1 style="margin-bottom: 20px;">All Products</h1>

        <ul style="list-style: none; padding: 0; width: 100%;">
            @foreach($products as $product)
                <li style="display: flex; align-items: center; justify-content: space-between; background-color: #fff; padding: 15px; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 10px;">

                <div style="flex: 1;">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 200px; border: 1px solid #ccc; border-radius: 4px;">
                        @endif
                    </div>
                    
                    <div style="flex: 1;">
                    <p></strong> {{ $product->name }}</p>
                    <p style="color:#0f5b3f; font-size:16px;
                    font-weight: bold;">
                        Nu.{{ $product->price }}
                    </p>
                    <p></strong> {{ $product->description }}</p>
                    </div>
                
                    <div>
                        <!-- In your view or blade file -->
                        <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" style="color: #fff; padding: 10px; border: none; border-radius: 4px;">Delete Product</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

</body>
</html>
