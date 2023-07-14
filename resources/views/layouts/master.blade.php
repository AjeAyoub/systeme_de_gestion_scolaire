<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/Book.gif" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @if (auth()->user()->role == 'admin')
            @include('layouts.admin-sidebar')
        @elseif (auth()->user()->role == 'enseignant')
            @include('layouts.enseignant-sidebar')
        @elseif (auth()->user()->role == 'comptable')
            @include('layouts.comptable-sidebar')
        @elseif (auth()->user()->role == 'etudiant')
            @include('layouts.etudiant-sidebar')
        @elseif (auth()->user()->role == 'parent')
            @include('layouts.parent-sidebar')

        @endif
        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================footer -->


    @include('layouts.footer-scripts')

    <!--================================= toastr-->

    <script src="{{ asset('js/toastr.min.js') }}"></script>

</body>

</html>
