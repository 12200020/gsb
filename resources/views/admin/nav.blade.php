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
    margin-left: -60px; /* Center the tooltip */
    opacity: 0;
    transition: opacity 0.3s;
    font-size: 12px;
    }

    /* Tooltip Container on Hover */
    .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    }

    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body style="padding:0; margin:0;">
    <div style="background-color: #fff; padding:0.5rem; display:flex; justify-content:space-between; align-items:center; position:sticky; top:0">
        <div style=" margin-left:2rem; padding:1rem;">
            <img src="{{ asset('images/logo.png') }}" style="height: 40px; width:100%; background-color:white"/>
        </div>
        <div style="display: flex;">
            
            <div style="margin-left: 2rem; cursor: pointer;" class="tooltip">
                <a href="{{ ('/admin/products') }}">
                    <span class="material-symbols-outlined" style="color: #333">
                        local_mall
                    </span>
                    <div class="tooltiptext">Products</div>
                </a>
            </div>

            <div style="margin-left: 2rem; margin-right: 2rem; font-size: 14px; cursor: pointer;" class="tooltip">
                <a href="{{ ('/admin/users') }}">
                    <span class="material-symbols-outlined" style="color: #333">
                        person
                    </span>
                    <div class="tooltiptext">Users</div>
                </a>
            </div>

            <div style="margin-right: 2rem;">
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <span id="logoutButton" class="material-symbols-outlined" style="cursor: pointer;">
                        Logout
                    </span>
                </form>
            </div>
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