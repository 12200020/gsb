<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        /* Tooltip Container */
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        /* Tooltip Text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: transparent;
            color: #333;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            left: 50%;
            margin-top: -50px;
            margin-left: -65px; /* Center the tooltip */
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
        }

        /* Tooltip Container on Hover */
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        /* Updated styles for responsive design */
        body {
            padding: 0;
            margin: 0;
            font-size: 16px; /* Base font size for responsiveness */
        }

        .nav-container {
            background-color: #fff;
            padding: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
        }

        .logo {
            margin-left: 2rem;
            padding: 1rem;
            max-width: 100px; /* Adjust the maximum width for the logo */
        }

        .navigation-links {
            display: flex;
            /* padding-bottom: 0.6rem; */
        }

        .tooltip-link {
            cursor: pointer;
            margin-left: 2rem;
            font-size: 14px;
        }

        .tooltip-link a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            padding: 0 10px; /* Add padding around each icon for spacing */
        }

        .material-symbols-outlined {
            font-size: 24px;
            margin-right: 5px;
        }

        /* Media query for responsive design */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
            }

            .logo {
                margin: 0;
                text-align: center;
                max-width: 100%; /* Adjust as needed for responsiveness */
            }

            .navigation-links {
                /* margin-top: 1rem; */
                justify-content: center;
            }

            .tooltip-link {
                margin: 0;
                margin-top: 1rem;
                text-align: center;
                font-size: 16px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="nav-container">
        <a href="/">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" style="max-width: 100%; height: auto; background-color: white;" alt="Logo">
            </div>
        </a>

        <div class="navigation-links">
            <!-- Home Link -->
            <div class="tooltip-link">
                <div class="tooltip">
                    <a href="{{ ('/') }}">
                        <span class="material-symbols-outlined" style="color: #333">
                            home
                        </span>
                        <div class="tooltiptext">Home</div>
                    </a>
                </div>
            </div>

            <!-- Services Link -->
            <div class="tooltip-link">
                <div class="tooltip">
                    <a href="{{ ('/services') }}">
                        <span class="material-symbols-outlined">
                            work
                        </span>
                        <div class="tooltiptext">Services</div>
                    </a>
                </div>
            </div>

            <!-- Products Link -->
            <div class="tooltip-link">
                <div class="tooltip">
                    <a href="{{ ('/products') }}">
                        <span class="material-symbols-outlined">
                            local_mall
                        </span>
                        <div class="tooltiptext">Products</div>
                    </a>
                </div>
            </div>

            <!-- My Profile Link (visible when authenticated) -->
            @if(Auth::check())
                <div class="tooltip-link">
                    <div class="tooltip">
                        <a href="{{ ('/profile') }}">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                            <div class="tooltiptext">My Profile</div>
                        </a>
                    </div>
                </div>

                <!-- Logout Link (visible when authenticated) -->
                <div class="tooltip-link">
                    <div class="tooltip">
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="#" id="logoutButton" class="logout-btn">
                                <span class="material-symbols-outlined" style="cursor: pointer;">
                                    Logout
                                </span>
                            </a>
                            <div class="tooltiptext">Logout</div>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login Link (visible when not authenticated) -->
                <div class="tooltip-link">
                    <div class="tooltip">
                        <a href="{{ ('login') }}">
                            <span class="material-symbols-outlined">
                                login
                            </span>
                            <div class="tooltiptext">Login</div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.getElementById('logoutButton');
            const logoutForm = document.getElementById('logoutForm');

            logoutButton.addEventListener('click', function() {
                logoutForm.submit();
            });
        });
    </script>
</body>
</html>
