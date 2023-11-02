<div
    style="padding: 0.5rem; display: flex; justify-content: space-between; 
align-items: center; background-color: #ffffff;">
    <div style="padding:3rem; margin-left:2rem;">
        <img src="{{ asset('images/logo.png') }}" style="height: 70px; width:100%; background-color:white" />
    </div>
    
    <div style="margin-right:5rem;">
        <div style="margin-top: 1rem">
            Services
        </div>
        <div style="margin-top: 1rem">
            Products
        </div>
        <div style="margin-top: 1rem">
            About Us
        </div>
    </div>

    <div style="margin-right:5rem;">
        <div>
            Facebook
        </div>
        <div style="margin-top: 1rem">
            X
        </div>
        <div style="margin-top: 1rem">
            Instagram
        </div>
    </div>

    <div style="margin-right:5rem;">
        <div>
            Facebook
        </div>
        <div style="margin-top: 1rem">
            X
        </div>
        <div style="margin-top: 1rem">
            Instagram
        </div>
    </div>

</div>
<div style="padding: 1rem; background-color: #010203; color:#ffffff; display:flex; justify-content:space-between;
padding-right: 5rem;">
    <div style="color: transparent">
        .
    </div>
    <div>
        &copy GCIT Student Barber, GSB 2023
    </div>
    <div id="scrollToTop" style="cursor: pointer;">
        Back to Top
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollToTopElement = document.getElementById('scrollToTop');

        scrollToTopElement.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>