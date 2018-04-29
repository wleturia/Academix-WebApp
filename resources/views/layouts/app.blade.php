<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Academix') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- SLICK THEME -->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">


    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }

        .dropdown-toggle::after {
            display: none
        }

        .dropdown-menu,
        .dropdown-menu-right {
            padding: 0;
            margin: 0;
        }

        .courses-list {
            margin: 0;
            padding: 0;
            max-width: 20rem;
            max-height: 18rem;

            min-width: 20rem;
            min-height: 4rem;
            overflow-y: scroll;
        }

        .dropdown-item,
        .dropdown-item a {
            text-decoration: none;
        }

        .list-course {
            display: flex;
            flex-direction: row;
        }

        .list-course-img img {
            width: 5rem;
            height: 5rem;
        }

        .list-course-detail {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /*justify-content: flex-start;*/
            overflow: hidden;
        }

        .list-course-detail p {
            padding: 0;
            margin: 0;
            word-wrap: break-word;

        }

        .course-name {
            font-size: .8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .course-description {
            font-size: .6rem;
        }

        .course-price {
            font-size: 1.2rem;
        }

        .course-discount {
            font-size: .8rem;
            text-decoration: line-through;
        }

        .professor-name {
            font-size: .8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .professor-message {
            font-size: .6rem;
        }

        .message-time {
            font-size: .8rem;
        }

        .btn-list {
            font-size: .5rem;
        }

        .btn-wrapper {
            border-top: 1px solid #ccc;
            background: #F2F3F5;
        }

        .btn-wish-list {
            width: 100%;
        }

        hr {
            margin: 0;
            padding: 0;
        }

.btn-options{
    border-top: 1px solid #ccc;
    background: #F2F3F5;    
    display: flex;
    justify-content: space-between;
}
.btn-option{
    width: 50%;
    border-radius: 0;
}

.btn-settings{
    background: rgba(245,248,250,0.6);
    display: flex;
    justify-content: space-between;
    border-bottom: 1px dashed rgba(0,105,217,0.6);
}
.texto{
    text-transform: uppercase;
    color: #0069D9;
    font-weight: bold;
}
.config{
    color: #0069D9;
    font-size: 1rem;
}
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Academix') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="nav-item dropdown mx-2">
                            <a id="courses" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Courses
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="courses">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aperiam ut, iure nemo vel alias nobis ipsum minima aliquam rerum.</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a id="love" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-heart"></i>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="love">
                                <div class="item-wrapper ">
                                    <ul class="courses-list">
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                        <a href="" class="btn btn-outline-primary btn-list">ADD TO CART</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                        <a href="" class="btn btn-outline-primary btn-list">ADD TO CART</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                        <a href="" class="btn btn-outline-primary btn-list">ADD TO CART</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="btn-wrapper p-3 m-0">
                                        <a href="" class="btn btn-primary btn-wish-list">GO TO WISH LIST</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a id="cart" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-shopping-cart"></i>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cart">
                                <div class="item-wrapper ">
                                    <ul class="courses-list">
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="course-name">COURSE's NAME</p>
                                                        <p class="course-description">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="course-price m-1">$10.99 <span class="course-discount">$100.00</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="btn-wrapper p-3 m-0">
                                        <p class="course-price p-1 text-center">TOTAL PRICE: $30.99 <span class="course-discount">$300.00</span></p>
                                        <a href="" class="btn btn-primary btn-wish-list">GO TO CART</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a id="notifications" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-bell"></i>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications">
                                <div class="item-wrapper ">
                                    <div class="btn-settings p-3 m-0">
                                        <div class="texto">
                                            Notifications
                                        </div>
                                        <div class="config">
                                           <a href="">     <i class="fas fa-cog"></i></a>
                                        </div>
                                    </div>
                                    <ul class="courses-list">
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="professor-name">PROFESOR</p>
                                                        <p class="professor-message">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="message-time m-1">10 minutes ago</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="professor-name">PROFESOR</p>
                                                        <p class="professor-message">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="message-time m-1">10 minutes ago</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                        <li class="dropdown-item p-3">
                                            <a href="">
                                                <div class="list-course">
                                                    <div class="list-course-img">
                                                        <img class="mx-auto d-block" src="{{ asset('img/not-found.jpg') }}" alt="" width="50" height="50">
                                                    </div>
                                                    <div class="list-course-detail mx-2">
                                                        <p class="professor-name">PROFESOR</p>
                                                        <p class="professor-message">Lorem ipsum dolor sit amet consectetur adipisicing elit Repellendus accusamus molestias distinctio nemo sapiente voluptas.</p>
                                                        <p class="message-time m-1">10 minutes ago</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                    </ul>
                                    <div class="btn-options p-0 m-0">
                                            <a href="" class="btn btn-outline-primary btn-option">MARK ALL AS READ</a>
                                            <a href="" class="btn btn-outline-primary btn-option">SEE ALL</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a> @if(Auth::user()->instructor==0)
                                <!--  {{Auth::user()->instructor}}-->
                                <a class="dropdown-item darker-item" href="{{ route('dashboard.instructor') }}">Become an Instructor</a> @else
                                <a class="dropdown-item" href="{{ route('dashboard.instructor.dashboard') }}">Instructor Dashboard</a> @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script>
        $('.slick-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });

    </script>
</body>

</html>
