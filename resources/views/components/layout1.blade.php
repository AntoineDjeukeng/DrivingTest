<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/skins/color-1.css">
    <link rel="stylesheet" href="css/style2.css">
    <!-- Style Switcher -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/color-1.css') }}" class="alternate-style" title="color-1" disabled>
    <link rel="stylesheet" href="{{ asset('css/skins/color-2.css') }}" class="alternate-style" title="color-2" disabled>
    <link rel="stylesheet" href="{{ asset('css/skins/color-3.css') }}" class="alternate-style" title="color-3" disabled>
    <link rel="stylesheet" href="{{ asset('css/skins/color-4.css') }}" class="alternate-style" title="color-4" disabled>
    <link rel="stylesheet" href="{{ asset('css/skins/color-5.css') }}" class="alternate-style" title="color-5" disabled>
    <link rel="stylesheet" href="{{ asset('css/style-switcher.css') }}">


</head>

<body>
    <!-- Main container start -->
    <div class="main-container">
        <!-- Aside start -->
        <div class="aside">
            <div class="logo">
                <a href="#"><span>A</span>DM</a>
            </div>
            <div class="nav-toggler">
                <span></span>
            </div>
            <ul class="nav">
                <li><a href="#home" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="#about"><i class="fa fa-user"></i>About</a></li>
                <li><a href="#services"><i class="fa fa-list"></i>Services</a></li>
                <li><a href="#portfolio"><i class="fa fa-envelope"></i>Portfolio</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i>Contact</a></li>

            </ul>
        </div>
        <!-- Aside end -->
        <!-- Main start -->
        <div class="main-content">
            {{ $slot }}
        </div>
        <!-- Main end -->



    </div>
    <!-- Main container end -->
    <!-- Style Switcher Start -->
    <div class="style-switcher open">
        <div class="style-switcher-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas "></i>
        </div>
        <h4>Theme Colors</h4>
        <div class="colors">
            <span class="color-1" onclick="setActiveStyle('color-1')"></span>
            <span class="color-2" onclick="setActiveStyle('color-2')"></span>
            <span class="color-3" onclick="setActiveStyle('color-3')"></span>
            <span class="color-4" onclick="setActiveStyle('color-4')"></span>
            <span class="color-5" onclick="setActiveStyle('color-5')"></span>
        </div>
    </div>
    <!-- Style Switcher End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
        integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/style-switcher.js') }}"></script>
</body>

</html>
