<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Error 404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('Bootstrap/assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('Bootstrap/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('Bootstrap/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('Bootstrap/assets/images/LogoMasjid.png') }}" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="p-4 my-auto">
                                        <div class="d-flex justify-content-center mb-5">
                                            <img src="{{ asset('Bootstrap/assets/images/svg/404.svg') }}" alt="" class="img-fluid">
                                        </div>

                                        <div class="text-center">
                                            <h1 class="mb-3">404</h1>
                                            <h4 class="fs-20">Page not found</h4>
                                        </div>

                                        <a href="/Dashboard" class="btn btn-soft-primary w-100">
                                            <i class="ri-home-4-line me-1"></i> Back to Home
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark-emphasis">
            <script>
                document.write(new Date().getFullYear())
            </script> © Masjid Jami'ALJannah - Achmad Fathoni
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('Bootstrap/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('Bootstrap/assets/js/app.min.js') }}"></script>

</body>

</html>
