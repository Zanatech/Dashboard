<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('layouts.head')

    <body>
        @include('layouts.navbar')

        @yield('content') 
    
        <!-- Javascript  -->
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/init.js"></script>
    </body>
</html>
