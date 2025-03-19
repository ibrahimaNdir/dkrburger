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
<div class="tete">
    @include('navbar')
</div>



<div class="containersss">
    <h2 class="cart-title">I. Votre Panier</h2>
    <div class="divider"></div>

    <div class="cart-content">
        <div class="cart-items">
            @php $total = 0 @endphp
            @if(session('panier'))
                @foreach(session('panier') as $id => $item)
                    @php $total += $item['prix'] * $item['quantite'] @endphp

                    <div class="cart-item" data-id="{{ $id }}">
                        <img src="{{ asset('storage/images/'.$item['image']) }}" alt="{{ $item['nom'] }}" class="item-image">

                        <div class="item-details">
                            <div class="item-title">{{ $item['nom'] }}</div>
                            <div class="item-subtitle">{{ $item['description'] }}</div>
                            <div class="item-price">{{ $item['prix'] }} FCFA</div>

                            <form action="{{ route('supprimerpanier',$id) }}" method="POST" class="m-0">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </div>

                        <div class="quantity-selector">
                            <input type="number" value="{{ $item['quantite'] }}" min=value  class="quantity-input" data-id="{{ $id }}">
                        </div>
                    </div>

                @endforeach
            @else
                <p class="empty-cart-message">Votre panier est vide</p>
            @endif
        </div>

        <div class="cart-summary">
            <div class="total-section">
                <span>Total:</span>
                <span class="total-price">{{ $total }} FCFA</span>
            </div>
            <div class="cart-actions">

                <a href="{{ route('menu') }}" class="continue-shopping">Continuer les achats</a>
                <a href="{{ route('commande') }}" class="checkout-button">Commander</a>
            </div>
        </div>
    </div>
</div>
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>
                        Contact Nous
                    </h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                  Location
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                  Call +221 331242345
                </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                  demo@gmail.com
                </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="" class="footer-logo">
                        DkrBurger
                    </a>
                    <p>
                        DkrBurger est une entreprise de restauration rapide qui propose des burgers et des plats faits maison.
                    </p>
                    <div class="footer_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>
                    Heures d'ouverture
                </h4>
                <p>
                    Chaque Jour
                </p>
                <p>
                    10:00 - 23:00
                </p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a><br><br>
                &copy; <span id="displayYear"></span> Distributed By
                <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
</footer>
<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js">
    <script src="https://kit.fontawesome.com/1462be1371.js" crossorigin="anonymous"></script>

<script>

</script>

</body>

</html>





