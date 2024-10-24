{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets') }}/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Citas') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/fullcalendar/fullcalendar.css')}}">

    <link rel="stylesheet" href="../../assets/vendor/css/pages/app-calendar.css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-calendar.css')}}">

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Charts -->
    <script src="{{ asset('assets/vendor/libs/chartjs/chartjs.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body class="font-sans antialiased" style="text-transform: uppercase;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.menu')

            <div class="layout-page">
                @include('layouts.header')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="content-title row">
                            @yield('title')
                        </div>
                        <div class="content-content">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.modals')

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>





    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/fullcalendar/fullcalendar.js')}}"></script>

    <script src="{{asset('assets/js/app-calendar-events.js')}}"></script>

    <script src="{{asset('assets/js/app-calendar.js')}}"></script>




    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/charts-chartjs.js') }}"></script>
    <script src="{{ asset('assets/JSgeneral/general.js') }}"></script>








    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function aplicarSelect2(elementId) {
                var element = $(elementId);
                element.each(function () {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        placeholder: 'Seleccione una opción',
                        dropdownParent: $this.parent()
                    });
                });
            }
            aplicarSelect2('.select2');
            

        });
        

    </script>
    @yield('js')

</body>

</html> --}}


<!DOCTYPE html>

<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Citas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <!-- Pickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

    
    <!---iconos-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Page CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/pages/app-calendar.css" />
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            @include('layouts.nav')

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    @include('layouts.aside')
                    <!--/ Menu -->
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!--/ Content -->

                    @include('layouts.footer')
                </div>
                <!--/ Content wrapper -->
            </div>

        </div>
    </div>
    
    @include('layouts.modals')


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
   
    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/moment/moment.js"></script>

    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{asset('assets/JSgeneral/general.js')}}"></script>

    <!-- Page JS -->
    <script src="../../assets/js/app-calendar-events.js"></script>
    <script src="../../assets/js/app-calendar.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function aplicarSelect2(elementId) {
                var element = $(elementId);
                element.each(function () {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        placeholder: 'Seleccione una opción',
                        dropdownParent: $this.parent()
                    });
                });
            }
            aplicarSelect2('.select2');
        });

    </script>


    @yield('js')

    <!-- Pickr JS -->
   <!-- Al final del archivo Blade, justo antes de cerrar el body -->
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.8.2/dist/pickr.min.js"></script>
</body>

</html>
