
<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template-free" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Citas Médicas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-heart" width="100" height="100" viewBox="0 0 24 24" stroke-width="2.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M11.993 16.75l2.747 -2.815a1.9 1.9 0 0 0 0 -2.632a1.775 1.775 0 0 0 -2.56 0l-.183 .188l-.183 -.189a1.775 1.775 0 0 0 -2.56 0a1.899 1.899 0 0 0 0 2.632l2.738 2.825z" />
                              </svg>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 text-center">Crear cuenta 🚀</h4>
                        <p class="mb-6">En empresa estamos felices de tenerlo</p>

                       
                            <x-authentication-card>
                            
                        
                                <x-validation-errors class="mb-4" />
                                <form id="form" method="POST" action="{{ route('register') }}" class="mb-6">
                                    @csrf
                        
                                    <div class="mb-6">
                                        <x-label for="name" value="{{ __('Nombre') }}" class="form-label" />
                                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                                            autofocus autocomplete="name" placeholder="Enter your username" />
                                    </div>
                        
                                    <div class="mb-6">
                                        <x-label for="email" value="{{ __('Correo Electrónico') }}" class="form-label" />
                                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                                            autocomplete="username" placeholder="Enter your email" />
                                    </div>
                        
                                    <div class="mb-6 form-password-toggle">
                                        <x-label for="password" value="{{ __('Constraseña') }}" class="form-label" />
                                        <div class="input-group input-group-merge">
                                            <x-input id="password" class="form-control" type="password" name="password" required
                                                autocomplete="new-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                        
                        
                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('login') }}">
                                            {{ __('¿Ya estás registrado?') }}
                                        </a>
                        
                                        <x-button class="btn btn-primary d-grid w-100 ml-4 mt-5">
                                            {{ __('Registrarme') }}
                                        </x-button>
                                    </div>
                                </form>
                            </x-authentication-card>
                   
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>