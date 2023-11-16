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

<style>
    /* Add this style for the default button appearance */
    button {
        background-color: transparent;
        color: #4CAF50;
        border: 1px solid #4CAF50;
        border-radius: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Add this style for the button on hover */
    button:hover {
        background-color: #0f5b3f;
        color: white;
        transition: background-color 0.3s ease;
    }
</style>

</head>
<body>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 2rem 5%;">

        @foreach($products as $product)
            <div class="product" style="width: 20%; margin: 2rem; display: flex; flex-direction: column; align-items: center; text-align: center; background-color: #fff; border-radius: 0.5rem; padding-bottom:0.5rem;">
                
                @if(file_exists(public_path('images/' . $product->image)))
<!-- ... -->
<div class="product" style="min-width: 100%; display: flex; flex-direction: column; align-items: center; text-align: center; background-color: #fff; border-radius: 0.5rem; padding-bottom:0.5rem; overflow: hidden;">
    <!-- ... -->
    <img src="{{ asset('images/' . $product->image) }}" style="width: 100%; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; transition: transform 0.3s ease;" alt="{{ $product->name }}" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" />
    <!-- ... -->
</div>
<!-- ... -->
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
                <div style="padding: 0.5rem; color:#0f5b3f; font-size:16px;
                font-weight: bold;">
                    Nu.{{ $product->price }}
                </div>
                <div style="padding: 0.5rem; font-size: 16px; color: grey;">
                    {{ $product->description }}
                </div>
                <button 
                onClick="go( {{ $product->contact_number }})"
                style="margin: 0.5rem; padding: 10px 25px; cursor: pointer; margin-bottom:1rem;">
                    Buy Now
                </button>
            </div>
        @endforeach
        <!-- {{ json_encode($products, JSON_PRETTY_PRINT) }} -->

    </div>

    <script>
    function go(phoneNumber) {
        // Open the link in a new tab
        window.open('https://wa.me/' + phoneNumber, '_blank');
    }
    </script>

<script>
    function zoomIn(element) {
        element.style.transform = "scale(1.1)";
    }

    function zoomOut(element) {
        element.style.transform = "scale(1)";
    }
</script>

</body>
</html>
