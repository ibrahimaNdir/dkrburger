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

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />


    @vite(['resources/css/acceuil/style.css'
,'resources/css/acceuil/style.scss',
'resources/css/acceuil/responsive.css',
'resources/js/index/custom.js',
'resources/js/index/bootstrap.js','resources/css/acceuil/bootstrap.css'])

</head>

<body>

<div class="hero_area">
    <div class="bg-box">
        <img src=" {{ asset('storage/images/hero-bg.jpg') }}" alt="">
    </div>
    <!-- header section strats -->
    @include('navbar')
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast Food Restaurant
                                    </h1>
                                    <p>
                                        Découvrez nos délicieux burgers faits avec des ingrédients frais et de qualité.
                                        Commandez en ligne et profitez d’une expérience unique !
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>Fast Food Restaurant</h1>
                                    <p>
                                        Savourez nos burgers gourmands et nos frites croustillantes, préparés avec des ingrédients frais
                                        et de qualité.
                                        Commandez en ligne et régalez-vous en quelques clics !
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>Fast Food Restaurant</h1>
                                    <p>
                                        Découvrez un fast-food où la qualité et la gourmandise se rencontrent !
                                        Nos burgers sont préparés avec des ingrédients frais et savoureux, accompagnés de frites
                                        croustillantes et de boissons rafraîchissantes.
                                        Que vous soyez sur place ou à emporter, nous vous garantissons une expérience rapide et
                                        délicieuse.
                                        Passez commande dès maintenant et régalez-vous !
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
</div>

<!-- offer section -->

<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
        <div class="container ">
            <div class="row">
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('storage/images/f1.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>Tasty Thursdays 🍔</h5>
                            <h6>Profitez de <span style="color: red; font-weight: bold;">20%</span> de réduction sur tous nos
                                burgers ce jeudi ! 🎉</h6>

                            <a href="">
                                Commandez Maintenant
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="box ">
                        <div class="img-box">
                            <img src=" {{ asset('storage/images/o2.jpg') }}" alt="">

                        </div>
                        <div class="detail-box">
                            <h5>🍕 Pizza Days 🎉</h5>
                            <h6>Profitez de <span style="color: red; font-weight: bold;">15%</span> de réduction sur toutes nos
                                pizzas cette semaine !</h6>

                            <a href="">
                                Order Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end offer section -->

<!-- food section -->

<section class='food_section layout_padding-bottom'>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Nos MENUS
            </h2>
        </div>

        <div class="images">
            @foreach($produits as $article)
                <div class="profile">
                    <div class="profile-image">
                        <img src="{{ asset('storage/images/'.$article['image']) }}" >
                    </div>

                    <div class="profile-name">
                        <h2>{{ $article['nom'] }}</h2>
                        <div class="profile-bio">
                            <p>{{ $article['description'] }}</p>

                            <div class="price">
                                {{ $article['prix'] }} FCFA
                                <button> <ion-icon name="cart-outline"></ion-icon></button>

                            </div>
                            {{--
                              <form action="{{ route('ajouter.panier') }}" method="post" class="form">
                                @csrf
                                <input type="hidden" class="nom" value="{{ $article['designation'] }}" name="article_designation">
                                <input type="hidden" class="desc" value="{{ $article['descriptions'] }}" name="article_desc">
                                <input type="hidden" class="prix" value="{{ $article['prixunitaire'] }}" name="article_prix">
                                <input type="hidden" class="id" value="{{ $article['idarticle'] }}" name="article_id">

                                <button type="submit"><ion-icon name="bag-handle-outline"></ion-icon></button>
                            </form>

                             --}}


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- end food section -->

<!-- about section -->

<section class="about_section layout_padding">
    <div class="container  ">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="{{ asset('storage/images/cheese burger.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Nous Sommes DkrBurger
                        </h2>
                    </div>
                    <p>
                        Chez DkrBurger, nous croyons que chaque bouchée doit être un moment inoubliable. Notre restaurant propose
                        des burgers faits maison avec des ingrédients frais et de qualité, soigneusement sélectionnés pour offrir
                        une
                        expérience culinaire exceptionnelle. Nous nous efforçons de créer une atmosphère conviviale où vous
                        pourrez
                        déguster nos plats dans un cadre agréable.
                    </p>
                    <a href="">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>






<!-- client section -->

<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2>
                Nos Clients
            </h2>
        </div>
        <div class="carousel-wrap row ">
            <div class="owl-carousel client_owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                "Une expérience incroyable ! Les plats sont savoureux, le service est impeccable et la livraison est
                                rapide.
                                Je reviendrai sans hésiter !"

                            </p>
                            <h6>
                                Mariama
                            </h6>
                            <p>
                                Faye
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="images/client1.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                "Le meilleur fast-food de la ville ! Les burgers sont délicieux, les ingrédients sont frais et le
                                service est rapide.
                                Je recommande à 100% !"

                            </p>
                            <h6>
                                Mouhamed
                            </h6>
                            <p>
                                Diop
                            </p>

                        </div>
                        <div class="img-box">
                            <img src="images/client2.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end client section -->

<!-- footer section -->
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
<!-- footer section -->

<!-- jQery -->
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





</body>

</html>
