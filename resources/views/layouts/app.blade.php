<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'NighaTech Global Pvt Ltd') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugins:css -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     --}}
    <link rel="stylesheet" href="{{ asset('vendors/toast/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link href="{{ asset('vendors/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    {{-- @livewireStyles --}}

    @stack('CSS')

    <style>
        .ck-editor__editable {
            height: 300px;
        }

        #cke_notifications_area_desc {
            display: none;
        }

        .toast {
            background-color: green !important;
        }
    </style>
</head>

<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    {{-- @livewireScripts --}}

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
    {{-- <script src="{{ asset('vendors/datatables-buttons/js/buttons.html5.min.js') }}"></script> --}}
    <script src="{{ asset('vendors/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('vendors/datatables-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    {{-- <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    {{-- <script src="{{ asset('js/chart.js')}}"></script> --}}
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->

    @stack('JS')
    <script>
        $(document).ready(function() {
            $(".select2").select2({});
            $("input[type=search]").addClass('form-control form-control-sm');
            // $("input[type=search]").setAttribute('placeholder','Search...');
        });


        $('body').on('click', '.track-btn', function() {
    var href = $(this).data('href');  // Get the URL from the data-href attribute
    window.location.href = href;       // Redirect to the URL
});

    </script>


    {{-- <script>
   $(document).ready(function() {
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('391e0b29360b9f418920', {
        cluster: 'mt1',
        forceTLS: true
    });

    var channel = pusher.subscribe('mqtt-event');

    channel.bind('mqtt-event', function(data) {
        // Show Toastr notification with an image
        var messageWithImage = '<img src="{{ asset("images/faces/face3.jpg")}}" alt="Image" style="width: 20px; height: 20px; margin-right: 10px;">' + data.message;
        toastr.success(messageWithImage, 'Notification');
    });

    // Toastr configuration (optional)
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
});
</script> --}}

    <script>
        $(document).ready(function() {
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
                cluster: 'mt1',
                forceTLS: true
            });

            var channel = pusher.subscribe('mqtt-event');

            channel.bind('mqtt-event', function(data) {
                // Show Toastr notification with an image
                //  var messageWithImage = '<img src="{{ asset('images/faces/face3.jpg') }}" alt="Image" style="width: 20px; height: 20px; margin-right: 10px;">' + data.message;
                toastr.success(data.message, 'Notification');

                // Check if the browser supports notifications
                if (!('Notification' in window)) {
                    alert('This browser does not support desktop notifications');
                    return;
                }

                // Check the current Notification permission
                if (Notification.permission === 'granted') {
                    // If permission is granted, send a notification
                    sendNotification(data);
                } else if (Notification.permission !== 'denied') {
                    // If permission is not denied, request permission
                    Notification.requestPermission().then(function(permission) {
                        if (permission === 'granted') {
                            sendNotification(data);
                        }
                    });
                }
            });


            function sendNotification(data) {
                var options = {
                    body: data.message,
                    icon: 'https://fastly.picsum.photos/id/3/5000/3333.jpg?hmac=GDjZ2uNWE3V59PkdDaOzTOuV3tPWWxJSf4fNcxu4S2g' // Optional icon
                };
                var notification = new Notification('Notification', options);

                notification.onclick = function(event) {
                    event.preventDefault(); // Prevent the browser from focusing the Notification's tab
                    window.open('https://nighatechglobal.com/',
                    '_blank'); // Open a URL when the notification is clicked
                };
            }
            // Toastr configuration (optional)
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        });
    </script>
</body>

</html>
