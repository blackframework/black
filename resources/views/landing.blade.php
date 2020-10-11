<!doctype html>
<html>
    <head>
        <title>
            {{ env('App_Name') }}
        </title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .height-100 {
                height: 100vh;
            }

            .height-60 {
                height: 60vh;
            }

            .height-50 {
                height: 50vh;
            }

            .height-30 {
                height: 30vh;
            }

            .height-40 {
                height: 40vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .upper{
                background: #222222;
            }

            .lower {
                background: #ffffff;
            }

            .navbar {
                width: 100%;
                padding: 25px 15px 0;
                position: absolute;
                top: 0;
                height: 60px;
                border: 0;
                display: flex;
            }

            .top-left {
                position: relative;
                width: 80%;
            }

            .top-right {
                position: relative;
            }

            .top-left > a, .top-right > a {
                color: #ffffff !important;
            }

            .text-logo {
                font-size: 16px;
            }

            .content {
                text-align: center;
            }

            .main-content {
                padding-top: 150px;
                text-align: center;
            }

            .bulb-font {
                /*font-size: 310px;*/
            }

            .view {
                position: absolute;
                top: 0;
                left: 65px;
                right: 0;
                bottom: 110px;
                -webkit-perspective: 400;
                perspective: 400;
            }

            .plane.main .circle {
                width: 80px;
                height: 80px;
                position: absolute;
                -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
                border-radius: 100%;
                box-sizing: border-box;
                box-shadow: 0 0 60px #ba60ff, inset 0 0 60px #b009e6;
            }

            .plane.main .circle::before, .plane.main .circle::after {
                border-radius: 100%;
                background: #d181f3;
                box-shadow: 0 0 60px 2px #9717e6;
            }

            .title {
                font-size: 90px;
                color: #ffffff;
            }

            p.slogan {
                text-align: center;
                font-size: 15px;
                color: #ffffff;
                font-family: inherit;
                letter-spacing: 2px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
    </head>

    <body>
        <div id="app">
            {{-- @include('sections.navigation.top') --}}
            @include('sections.flash.messages')

            <div class="flex-center position-ref height-50 upper">
                <div class="navbar">
                    
                    <div class="top-left links">
                        @include('sections.navigation.top-left')
                    </div>

                    <div class="top-right links">
                        @include('sections.navigation.top-right')
                    </div>

                </div>

                <div class="main-content">
                    <div class="content-mssg col-md-10">
                        <div class="animated zoomIn">
                            <div class="title m-b-md">
                                {{ env('App_Name') }}
                            </div>
                            <p class="slogan">{{ config('app.slogan') }}</p>
                        </div>
                    </div>
                    <!-- <div class="content-icon col-md-2">
                        <div class="view roller">
                            <div class="plane main">
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="circle"></div>
                            </div>
                        </div>
                        <i class="ionicons ion-ios-lightbulb bulb-font"></i>
                    </div> -->
                </div>
            </div>

            <div class="flex-center position-ref height-30 lower">
                <div class="content">
                    <div class="links">
                        <a href="https://laravel.com/docs/5.2/eloquent">Laravel ORM</a>
                        <a href="https://book.cakephp.org/3.0/en/orm.html">CakePHP ORM</a>
                        <a href="https://github.com/rawphp-framework/RawPHP-docs/blob/master/docs/features/csrf.md"> CSRF </a>
                        <a href="https://github.com/rawphp-framework/RawPHP-docs/blob/master/docs/objects/request.md" >API</a>
                        <a href="https://github.com/rawphp-framework/RawPHP-docs/blob/master/docs/objects/router.md"> Routing </a>
                        <a href="https://github.com/rawphp-framework/RawPHP-docs/blob/master/docs/features/templates.md" > Templating </a>
                        <a href="https://bootswatch.com/flatly/">Flat-Ui</a>
                        <a href="https://github.com/rawphp-framework/RawPHP-docs/">Docs</a>
                        <a href="https://github.com/rawphp-framework/rawphp">Github</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
