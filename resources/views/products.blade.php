<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Products</title>
    <style>
        @media (max-width: 1200px) {
            .product {
                width: 30% !important;
            }
        }

        @media (max-width: 768px) {
            .product {
                width: 45% !important;
            }
        }

        @media (max-width: 480px) {
            .product {
                width: 100% !important;
                margin: 1rem 0 !important;
            }
        }
    </style>
</head>
<body>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 2rem 5%;">

        @foreach($products as $product)
            <div class="product" style="width: 20%; margin: 2rem; display: flex; flex-direction: column; align-items: center; text-align: center; background-color: #fff; border-radius: 0.5rem; padding-bottom:0.5rem;">
                
                @if(file_exists(public_path('images/' . $product->image)))
                    <img src="{{ asset('images/' . $product->image) }}" style="width: 100%; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;" alt="{{ $product->name }}" />
                @else
                    <div style="width: 100%; height: 320px; background-color: #868686; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; display: flex; justify-content: center; align-items: center;">
                        <p style="color: #d3d3d3;">Image Not Found</p>
                    </div>
                @endif
                
                <div style="padding: 0.5rem; font-size: 14px; color: grey;">
                    {{ date('F j, Y, g:i a', strtotime($product->created_at)) }}
                </div>
                <div style="padding: 0.5rem;">
                    {{ $product->name }}
                </div>
                <div style="padding: 0.5rem;">
                    Price: Nu.{{ $product->price }}
                </div>
                <div style="padding: 0.5rem; font-size: 16px; color: grey;">
                    {{ $product->description }}
                </div>
                <button style="margin: 0.5rem; padding: 8px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
                    Buy Now
                </button>
            </div>
        @endforeach

    </div>
</body>
</html>
