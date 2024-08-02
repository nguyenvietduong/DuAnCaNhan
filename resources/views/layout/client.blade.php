<!DOCTYPE html>
<html lang="zxx" dir="lrt">

<!-- Mirrored from travelloo.vercel.app/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:23:55 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    @include('frontend.component.css')
</head>

<body>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <!-- Header Logo -->
                @include('frontend.component.header_logo')
                <!-- Header NavBar -->
                @include('frontend.component.header_navbar')
                <!-- Header Search -->
                @include('frontend.component.header_search')
            </nav>
        </div>
    </header>

    <main>
        @yield('clientContent')
    </main>

    @include('frontend.component.footer')

    @include('frontend.component.script')

</body>

<!-- Mirrored from travelloo.vercel.app/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 14:26:50 GMT -->

</html>