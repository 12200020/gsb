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

<link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/footer.css') }}"> 
</head>

<body>
    <div class="landing-page-footer">
        <div class="landing-page-menu">
          <h2 style="">GCIT Student Barber</h2>

          <a href="/">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" 
                style="max-width: 200%; height: auto; background-color: white;" alt="Logo">
            </div>
        </a>
        </div>
      </div>

      <div class="landing-page-follow-container1" style="background-color:rgb(43, 42, 42);  margin:0; padding-bottom:1rem; ">
        <span class="landing-page-text16" style="padding-bottom: 1rem; color:#fff">Follow us on</span>
        <div class="landing-page-icons-container1">
          <a
            href="https://instagram.com"
            target="_blank"
            rel="noreferrer noopener"
            class="landing-page-link09"
          >
            <svg
              viewBox="0 0 877.7142857142857 1024"
              class="landing-page-icon11"
            >
              <path
                d="M585.143 512c0-80.571-65.714-146.286-146.286-146.286s-146.286 65.714-146.286 146.286 65.714 146.286 146.286 146.286 146.286-65.714 146.286-146.286zM664 512c0 124.571-100.571 225.143-225.143 225.143s-225.143-100.571-225.143-225.143 100.571-225.143 225.143-225.143 225.143 100.571 225.143 225.143zM725.714 277.714c0 29.143-23.429 52.571-52.571 52.571s-52.571-23.429-52.571-52.571 23.429-52.571 52.571-52.571 52.571 23.429 52.571 52.571zM438.857 152c-64 0-201.143-5.143-258.857 17.714-20 8-34.857 17.714-50.286 33.143s-25.143 30.286-33.143 50.286c-22.857 57.714-17.714 194.857-17.714 258.857s-5.143 201.143 17.714 258.857c8 20 17.714 34.857 33.143 50.286s30.286 25.143 50.286 33.143c57.714 22.857 194.857 17.714 258.857 17.714s201.143 5.143 258.857-17.714c20-8 34.857-17.714 50.286-33.143s25.143-30.286 33.143-50.286c22.857-57.714 17.714-194.857 17.714-258.857s5.143-201.143-17.714-258.857c-8-20-17.714-34.857-33.143-50.286s-30.286-25.143-50.286-33.143c-57.714-22.857-194.857-17.714-258.857-17.714zM877.714 512c0 60.571 0.571 120.571-2.857 181.143-3.429 70.286-19.429 132.571-70.857 184s-113.714 67.429-184 70.857c-60.571 3.429-120.571 2.857-181.143 2.857s-120.571 0.571-181.143-2.857c-70.286-3.429-132.571-19.429-184-70.857s-67.429-113.714-70.857-184c-3.429-60.571-2.857-120.571-2.857-181.143s-0.571-120.571 2.857-181.143c3.429-70.286 19.429-132.571 70.857-184s113.714-67.429 184-70.857c60.571-3.429 120.571-2.857 181.143-2.857s120.571-0.571 181.143 2.857c70.286 3.429 132.571 19.429 184 70.857s67.429 113.714 70.857 184c3.429 60.571 2.857 120.571 2.857 181.143z"
              ></path>
            </svg>
          </a>
          <a
            href="https://facebook.com"
            target="_blank"
            rel="noreferrer noopener"
            class="landing-page-link10"
          >
            <svg
              viewBox="0 0 602.2582857142856 1024"
              class="landing-page-icon13"
            >
              <path
                d="M548 6.857v150.857h-89.714c-70.286 0-83.429 33.714-83.429 82.286v108h167.429l-22.286 169.143h-145.143v433.714h-174.857v-433.714h-145.714v-169.143h145.714v-124.571c0-144.571 88.571-223.429 217.714-223.429 61.714 0 114.857 4.571 130.286 6.857z"
              ></path>
            </svg>
          </a>
          <a
            href="https://twitter.com"
            target="_blank"
            rel="noreferrer noopener"
            class="landing-page-link11"
          >
            <svg
              viewBox="0 0 950.8571428571428 1024"
              class="landing-page-icon15"
            >
              <path
                d="M925.714 233.143c-25.143 36.571-56.571 69.143-92.571 95.429 0.571 8 0.571 16 0.571 24 0 244-185.714 525.143-525.143 525.143-104.571 0-201.714-30.286-283.429-82.857 14.857 1.714 29.143 2.286 44.571 2.286 86.286 0 165.714-29.143 229.143-78.857-81.143-1.714-149.143-54.857-172.571-128 11.429 1.714 22.857 2.857 34.857 2.857 16.571 0 33.143-2.286 48.571-6.286-84.571-17.143-148-91.429-148-181.143v-2.286c24.571 13.714 53.143 22.286 83.429 23.429-49.714-33.143-82.286-89.714-82.286-153.714 0-34.286 9.143-65.714 25.143-93.143 90.857 112 227.429 185.143 380.571 193.143-2.857-13.714-4.571-28-4.571-42.286 0-101.714 82.286-184.571 184.571-184.571 53.143 0 101.143 22.286 134.857 58.286 41.714-8 81.714-23.429 117.143-44.571-13.714 42.857-42.857 78.857-81.143 101.714 37.143-4 73.143-14.286 106.286-28.571z"
              ></path>
            </svg>
          </a>
        </div>
      </div>
    <!-- Footer Section -->
    <div class="footer">
        <div>
            &copy; GCIT Student Barber, GSB 2023
        </div>
        <div style="color: transparent">
            .
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
