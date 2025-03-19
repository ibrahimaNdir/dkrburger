

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> Feane </title>

    @vite(['resources/css/acceuil/style.css'
,'resources/css/acceuil/style.scss',
'resources/css/acceuil/responsive.css',
'resources/js/index/custom.js',
'resources/js/index/bootstrap.js','resources/css/acceuil/bootstrap.css'])

</head>
<body>
@php
    $totalQuantity = 0;
@endphp

@if(session('cart'))
    @foreach(session('cart') as $item)
        @php
            $totalQuantity += $item['quantity'];
        @endphp
    @endforeach
@endif

<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
            <span>
              DkrBurger
            </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('accueil') }}">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">A Propos</a>
                    </li>




                </ul>
                <div class="user_option">
                    <a href="{{ route('panier') }}" class="order_online position-relative">
                        <ion-icon name="cart-outline"></ion-icon>
                        <span id="panier-count" class="badge badge-danger badge-counter position-absolute">
                {{ count(session('panier', [])) }}
            </span>
                    </a>
                </div>


            </div>
        </nav>
    </div>
</header>

</body>

