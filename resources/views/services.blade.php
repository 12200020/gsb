
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

<div style="display: flex; flex-wrap: wrap; justify-content: space-around; margin: 2rem 10rem;">
    @foreach($services as $s)
        <div style="width: 20%; margin: 2rem; display: flex; flex-direction: column; align-items: center; text-align: center; background-color:#fff; border-radius:0.5rem;">

            <div class="product" style="width: 100%; display: flex; flex-direction: column; align-items: center; text-align: center; background-color: #fff; border-radius: 0.5rem; padding-bottom:0.5rem; overflow: hidden;">
                <!-- ... -->
                <img src="{{ asset('images/' . $s->image) }}" style="width: 100%; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; transition: transform 0.3s ease;" alt="{{ $s->name }}" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)" />
                <!-- ... -->
            </div>

            <div style="padding: 0.5rem; font-size:12px; color:grey;">{{ date('F j, Y, g:i a', strtotime($s->created_at)) }}</div>
            <div style="padding: 0.5rem;">{{ $s->service_name }}</div>
            <div style="padding: 0.5rem;">Price: Nu.{{ $s->price }}</div>
            <div style="padding: 0.5rem;">{{ $s->description }}</div>

            @if(auth()->id() != $s->post_by)
            <button 
                onClick="go( {{ $s->contact_number }})"
                style="margin: 0.5rem; padding: 10px 25px; cursor: pointer;">
                    Contact Now
                </button>
             @endif

            @if(auth()->id() == $s->post_by)
                <form action="{{ route('services.delete', $s->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" style="margin: 0.5rem; padding: 8px 20px; background-color: #dc3545;
             color: white; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
                </form>
            @endif

        </div>
    @endforeach
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
