<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rasha Eldeeb - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset ('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/templatemo.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/aos.css') }}" rel="stylesheet">
    
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>


    {{-- <link href="{{ asset ('css/templatemo-nomad-force.css)}}" rel="stylesheet"> --}}


</head>
<body>
    
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- /Footer -->    
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="copyright-text mb-0">Copyright © Rasha El deeb 2022. By <a href="https://webmaco.net/" target="_blank">Webmaco</a></p>
                </div>

                <div class="col-lg-3 col-5 ms-auto">
                     <ul class="social-icon">
                        <li>
                            <a 
                            href="https://www.facebook.com/RashaAldeebPodcastConsultant" 
                            class="social-icon-link bi-facebook"
                            target="_blank"></a>
                        </li>

                        <li>
                            <a 
                            href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQHxG5mWTWWQ-AAAAX9fcn0IvX5syrHNagT2RrsRFCPxbQMk7ZAy8TQSlmJiaj2_Bz4ShHs20OWfsB-_8g5qpjFTikGu3lZ0O7DO_U5tGnQDlhSvHpvGfGoanO8RBJP3SGRI_Ao=&originalReferer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Frasha-aldeeb-the-podcast-consultant-47919180%2F"
                            class="social-icon-link bi-linkedin"
                            target="_blank"></a>
                        </li>

                    </ul>
                </div>

             </div>
        </section>
    </footer><!-- /Footer -->

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset ('js/jquery.min.js') }}"></script>
    <script src="{{ asset ('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset ('js/aos.js') }}"></script>
    <script src="{{ asset ('js/scrollspy.min.js') }}"></script>
    <script src="{{ asset ('js/custom.js') }}"></script>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fbe393c31bf2b31"></script>


    @yield('scripts')
    


</body>
</html>
