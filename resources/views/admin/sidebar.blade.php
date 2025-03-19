<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
    @vite(['resources/css/app.css',
                      'resources/css/adminproduits/style.css',
                      'resources/js/admin/index.js'])
</head>
<body>

<div class="sidebar">
    <a href="#" class="logo">
        <i class='bx bx-restaurant'></i>
        <div class="logo-name"><span>Dkr</span>Burger</div>
    </a>
    <ul class="side-menu">
        <li><a href=""><i class='bx bxs-dashboard'></i>Tableau de Bord </a></li>
        <li><a href="{{route('admin.produits')}}"><i class='bx bx-restaurant'></i>Burger</a></li>
        <li><a href="{{route('admin.commandes')}}"><i class='bx bx-cart'></i>Commandes</a></li>

        <li><a href="{{route('admin.stats')}}"><i class='bx bx-bar-chart-alt'></i>Statistique et Rapports</a></li>
        <li><a href="#"><i class="bx bx-envelope"></i> Mails</a></li>




    </ul>
    <ul class="side-menu">
        <li>
            <a href="#" class="logout">
                <i class='bx bx-log-out-circle'></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->

<!-- Main Content -->
<div class="content">
    <!-- Navbar -->
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="theme-toggle" hidden>
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notif">
            <i class='bx bx-bell'></i>
            <span class="count">0</span>
        </a>

    </nav>
@yield('content')
</body>
</html>
