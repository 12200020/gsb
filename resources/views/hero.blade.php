<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Banner</title>
    <style>
        /* Container styles */
        .hero-container {
            position: relative;
            overflow: hidden;
            opacity: 0; /* Set initial opacity to 0 */
            animation: fadeIn 2s forwards; /* Use a fade-in animation with a duration of 2 seconds */
        }

        /* Image styles */
        .hero-image {
            width: 100%;
            height: auto;
            background-color: white;
        }

        /* Overlay styles */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust overlay color and transparency */
        }

        /* Content styles */
        .content {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            z-index: 1; /* Ensure the content is on top of the overlay */
        }

        /* Heading styles */
        h1 {
            font-size: 2vw;
            max-width: 90vw;
            margin-bottom: 20px; /* Add some bottom margin for spacing */
            position: relative;
            animation: slideIn 2s forwards; /* Use a slide-in animation with a duration of 2 seconds */
        }

        /* Media query for heading size and button size */
        @media (min-width: 769px) {
            h1 {
                font-size: 48px;
            }
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            to {
                opacity: 1; /* Set opacity to 1 at the end of the animation */
            }
        }

        /* Slide-in animation */
        @keyframes slideIn {
            from {
                left: -100%; /* Start off-screen to the left */
            }
            to {
                left: 0; /* Slide in to the center */
            }
        }
    </style>
</head>
<body>
    <div class="hero-container">
        <img src="{{ asset('images/herobanner2.jpg') }}" class="hero-image" alt="Hero Banner Image">
        <div class="overlay"></div>
        <div class="content">
            <h1>
                Elevate Your Style, Strenghtening Community
            </h1>
            <a href="/services" style="display: inline-block; 
            padding: 1.3vw 3vw; 
            background-color: #fff; color: #000; text-decoration: none; 
            border-radius: 25px; margin-top: 5vw;">
                Explore
            </a>
        </div>
    </div>
</body>
</html>
