<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Purbachal Ladies Club LTD">
    <meta name="keywords" content="Purbachal Ladies Club LTD, Purbachal Ladies Club, Ladies Club In Purbachal, Purbachal, Ladies Club, Ladies Club In Dhaka">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('user_ui') }}/assets/img/favicon.ico">
    @include('user_ui.partials.css')
    <title>@yield('title') - PURBACHAL LADIES CLUB LTD.</title>
</head>

<body class="home">
    <div id="page" class="full-page">
        <!--------Header Start---->
        @include('user_ui.partials.header')
        <!--------Header end---->

        <!--main Start --->
        <main id="content" class="site-main">
            @yield('content')
        </main>
        <!--main end --->

        <!-- footer part Start-->
        @include('user_ui.partials.footer')
        <!-- footer part End-->

        <!-- back to top start-->
        <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!-- back to top end-->
    </div>
    <!-- JavaScript -->
    @include('user_ui.partials.script')
</body>

</html>
