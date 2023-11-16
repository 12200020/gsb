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
    <body style="background-color: #f3f3f3; margin: 0; padding: 0; display: flex;
     flex-direction: column; min-height: 100vh; overflow-x: hidden;">

        @include('nav')

        <h1 style="text-align:center;">
            Products
        </h1>

        <div style="display: flex; justify-content: center;">
            <form action="{{ route('searchProducts') }}" method="GET" style="display: flex;">
                <input type="text" name="search" placeholder="Search products" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;" value="{{ request('search') }}">
                <button type="submit" style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; margin-left: 6px;">Search</button>
            </form>
        
            <form action="{{ route('sortProducts') }}" method="GET" style="margin-left: 1rem;">
                <label for="sort" style="margin-right: 6px;">Sort by:</label>
                <select name="sort" id="sort" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="price_asc">Price (Low to High)</option>
                    <option value="price_desc">Price (High to Low)</option>
                    <option value="name_asc">Name (A to Z)</option>
                    <option value="name_desc">Name (Z to A)</option>
                </select>
                <button type="submit" style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;">Sort</button>
            </form>
            
        </div>
        
        <div id="productList">
        @include('products')
        </div>
        
        @include('footer')
        
    </body>
</html>