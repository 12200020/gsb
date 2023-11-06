<div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 2rem 10rem;">
    @foreach($products as $product)
        <div style="width: 20%; margin: 2rem; display: flex; flex-direction: column; align-items: center; text-align: center; background-color:#fff; border-radius:0.5rem;">
            <img src="{{ asset('images/' . $product->image) }}" style="width: 100%; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;" alt="{{ $product->name }}" />
            <div style="padding: 0.5rem; font-size:12px; color:grey;">{{ date('F j, Y, g:i a', strtotime($product->created_at)) }}</div>
            <div style="padding: 0.5rem;">{{ $product->name }}</div>
            <div style="padding: 0.5rem;">Price: Nu.{{ $product->price }}</div>
            <div style="padding: 0.5rem;">{{ $product->description }}</div>
            <button style="margin: 0.5rem; padding: 8px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Buy Now</button>
        </div>
    @endforeach
</div>