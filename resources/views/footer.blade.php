<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Design</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header Section */
        .header {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
        }

        .logo {
            padding: 1rem;
            text-align: center;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .menu {
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: flex-end;
        }

        .social-links a {
            margin: 0 0.5rem;
        }

        .social-links img {
            width: 24px;
            height: auto;
        }

        /* Footer Section */
        .footer {
            padding: 1rem;
            background-color: #010203;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            padding-right: 1rem;
        }

        .scrollToTop {
            cursor: pointer;
        }

        /* Media Queries for Responsive Design */
        @media screen and (min-width: 768px) {
            .header {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .menu {
                margin-top: 0;
                margin-right: 10rem;
            }
        }

        @media screen and (max-width: 768px) {
            .social-links {
                margin-right: 0.8rem;
                margin-top: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" />
        </div>

        <div class="menu">
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

        <div class="social-links">
            <div>
                <a href="https://www.facebook.com">
                    <img src="{{ asset('images/social/fb.png') }}" alt="Facebook" />
                </a>
            </div>
            <div>
                <a href="https://www.x.com">
                    <img src="{{ asset('images/social/x.png') }}" alt="X" />
                </a>
            </div>
            <div>
                <a href="https://www.instagram.com">
                    <img src="{{ asset('images/social/ig.png') }}" alt="Instagram" />
                </a>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <div style="color: transparent">
            .
        </div>
        <div>
            &copy; GCIT Student Barber, GSB 2023
        </div>
        <div class="scrollToTop">
            Back to Top
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollToTopElement = document.querySelector('.scrollToTop');

            scrollToTopElement.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
