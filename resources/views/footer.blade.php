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
            background-color: grey;
            color:#fff;
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
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #3498db;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            color: #ffffff;
            display: none;
        }

        .scrollToTop.active {
            background-color: grey;
        }

        .empty {
            background-color: transparent !important;
            color: #3498db !important;
        }

        .water-fill {
            border-radius: 50%;
            background: conic-gradient(
                #3498db 0%,
                #3498db 50%,
                transparent 50%,
                transparent 100%
            );
            transition: background 0.3s ease-in-out;
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
            <a href="{{ ('/services') }}" style="color:#fff; text-decoration:none;">
            Services
            </a>
            </div>
            <div style="margin-top: 1rem">
            <a href="{{ ('/products') }}" style="color:#fff; text-decoration:none;">
            Products
            </a>
            </div>
            <div style="margin-top: 1rem">
            <a href="{{ ('/products') }}" style="color:#fff; text-decoration:none;">
            About Us
            </a>
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
        <div class="scrollToTop" id="scrollToTop">
            <div class="water-fill">&uarr;</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scrollToTopElement = document.getElementById('scrollToTop');

            window.addEventListener('scroll', function () {
                const scrollPercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight) * 100;

                if (scrollPercentage > 10) {
                    scrollToTopElement.style.display = 'block';
                    scrollToTopElement.classList.add('active');
                } else {
                    scrollToTopElement.style.display = 'none';
                    scrollToTopElement.classList.remove('active');
                }

                const gradient = `conic-gradient(
                    #343541 0%,
                    #343541 ${scrollPercentage}%,
                    transparent ${scrollPercentage}%,
                    transparent 100%
                )`;

                document.querySelector('.water-fill').style.background = gradient;
            });

            scrollToTopElement.addEventListener('click', function () {
                scrollToTopElement.style.display = 'none';
                scrollToTopElement.classList.add('empty');
                setTimeout(function () {
                    scrollToTopElement.style.display = 'block';
                    scrollToTopElement.classList.remove('empty');
                }, 1000);

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
