<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Landing Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="main-wrapper p-0">
        <div class="row w-full p-0 m-0">
            <div class="col-md-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-3 mt-4">Choose a plan</h3>
                        <p class="text-muted text-center mb-4 pb-2">Choose the features and functionality your
                            team need today. Easily upgrade as your company grows.</p>
                        <div class="container">
                            <div class="row">
                                @foreach ($posts as $post)
                                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image"
                                                    class="text-primary icon-xxl d-block mx-auto my-3">
                                                <h4 class="text-center">{{ $post->title }}</h4>
                                                <h5 class="text-primary text-center mb-4">{{ $post->genre }}</h5>
                                                <div class="d-grid">
                                                    <a href="{{ route('posts.show', $post->slug) }}"
                                                        class="btn btn-primary mt-4">Watch Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>

    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/js/carousel.js')}}"></script> --}}

    <!-- End custom js for this page -->
    <script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>
</body>

</html>
