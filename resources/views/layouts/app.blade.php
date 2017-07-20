<!doctype html>

<html lang="en">

    @include('layouts.head')
    <body>
        @include('layouts.navbar.navbar')
        <div class="container-fluid">
            <div id="page-wrap" class="row">
                <section id="main-content">
                    <div id="guts">
                        @yield('content')
                    </div>
                </section>                 
            </div>
        </div>
        
        <!-- Javascript  -->
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>
    </body>
</html>