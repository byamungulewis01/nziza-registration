<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-wide " dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="front-pages">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Nziza Global Tanzania</title>


    <meta name="description" content="Nziza Global Tanzania" />
    <meta name="keywords" content="Nziza Global Tanzania, Nziza , Nziza Global">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/nziza-logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tablericons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}" />
    <!-- Vendors CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" /> --}}
    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}" />
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16541374180'); </script>
    <!-- Helpers -->
    @yield('conversion')
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/front-config.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
    <style>
       .countdown-container {
  display: flex;
  flex-direction: column;
  align-items:center;
  justify-content: center;
  height: 100%;
  color: white;
}

.countdown {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  gap: 3rem;
  margin-left: 2rem;
}

.countdown h2 {
  font-size: 2rem;
  background: linear-gradient(to right, #ffd900, #ff2f00);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

@media (min-width: 768px) {
  .countdown-container {
    margin-left: 4rem;
  }
}
    </style>

</head>

<body>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
                <!-- Menu logo wrapper: Start -->
                <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                    <!-- Mobile menu toggle: Start-->
                    <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu-2 ti-sm align-middle"></i>
                    </button>
                    <!-- Mobile menu toggle: End-->
                    <a href="https://nzizaglobal.co.tz" class="app-brand-link">
                        <img src="{{ asset('assets/logo/Nziza_Global_TZ_LOGO_PNG.png') }}" class="mt-1"
                            alt="Nziza Logo" width="170">
                    </a>
                </div>
                <!-- Menu logo wrapper: End -->
                <!-- Menu wrapper: Start -->
                <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-x ti-sm"></i>
                    </button>

                </div>
                <div class="landing-menu-overlay d-lg-none"></div>
                <!-- Menu wrapper: End -->
                <!-- Toolbar: Start -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">


                    <!-- navbar button: Start -->
                    <li>

                        <a href="https://nzizaglobal.co.tz/" class="btn btn-primary" target="_blank"><span
                                class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span><span
                                class="d-none d-md-block">Back to Website</span></a>
                    </li>
                    <!-- navbar button: End -->
                </ul>
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        @yield('content')
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>

    {{-- <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script> --}}

    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{ asset('assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('assets/js/front-main.js') }}"></script>
    <script>
        $('#who').change(function() {
            var choice = $(this).val();
            if (choice == 'none') {
                $('#submit_button').attr('disabled', true);
                //     Swal.fire({
                //     title: "Warning!",
                //     text: "You are not authorized to register to this training",
                //     icon: "warning",
                // });
                let timerInterval;
                Swal.fire({
                    title: "Warning You!",
                    html: "You are not authorized to register to this training </br>I will close in <b></b> milliseconds.",
                    timer: 5000,
                    icon: "warning",
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                        window.location.href = "https://nzizaglobal.co.tz/";
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });
            } else {
                $('#submit_button').attr('disabled', false);
            }

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#submit_button').click(function() {
                var button = $(this);
                button.html(
                    '<span class="spinner-border me-1" role="status" aria-hidden="true"></span> Loading...'
                    ).prop('disabled', true);
                document.getElementById('register').submit();
            });
        });
    </script>

<script>
   // Define the countdown function
const countDown = () => {
  // Set the release date for the Aquaman movie
  const releaseDate = new Date('July 15, 2024 00:00:00').getTime();

  // Get the current date and time
  const presentDate = new Date().getTime();

  // Calculate the remaining time until the release
  const gap = releaseDate - presentDate;

  // Define constants for time units in milliseconds
  const second = 1000;
  const minute = 60 * second;
  const hour = 60 * minute;
  const day = 24 * hour;

  // Calculate the remaining days, hours, minutes, and seconds
  const dayText = Math.floor(gap / day);
  let hourText = Math.floor((gap % day) / hour);
  const minuteText = Math.floor((gap % hour) / minute);
  const secondText = Math.floor((gap % minute) / second);

  // Add leading zero to hours if less than 10
  if (hourText < 10) {
    hourText = '0' + hourText;
  }

  // Update the HTML elements with the countdown values
  document.querySelector('.day').textContent = dayText;
  document.querySelector('.hour').textContent = hourText;
  document.querySelector('.minute').textContent = minuteText;
  document.querySelector('.second').textContent = secondText;
};

// Call the countdown function initially to display the countdown values
countDown();

// Set up a recurring timer to update the countdown every second
setInterval(countDown, 1000);
</script>

</body>

</html>

<!-- beautify ignore:end -->
