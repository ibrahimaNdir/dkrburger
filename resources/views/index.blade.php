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
        <img src=" {{ asset('image/hero-bg.jpg') }}" alt="">
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
                            <img src="{{ asset('image/boxfrites.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>Box Burgers + Frites</h5>
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
                            <img src=" {{ asset('image/box coca.jpg') }}" alt="">

                        </div>
                        <div class="detail-box">
                            <h5>Combo Burgers + Coca Cola</h5>
                            <h6>Profitez de <span style="color: red; font-weight: bold;">15%</span> de réduction sur toutes nos
                                pizzas cette semaine !</h6>

                            <a href="">
                                Commandez Maintenant
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
                        <img src="{{ asset('image/'.$article['image']) }}" >
                    </div>

                    <div class="profile-name">
                        <h2>{{ $article['nom'] }}</h2>
                        <div class="profile-bio">
                            <p>{{ $article['description'] }}</p>

                            <div class="price">
                                {{ $article['prix'] }} FCFA
                                <button class="add-to-cart" data-id="{{ $article['id'] }}" id="addToCartBtn">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </button>
                            </div>
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
                    <img src="{{ asset('image/cheese burger.jpg') }}" alt="">
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Ajouter les styles nécessaires en CSS via JavaScript
    $(document).ready(function() {
        // Injecter les styles CSS nécessaires
        $('head').append(`
        <style>
            /* Notification toast */
            .cart-notification {
                position: fixed;
                top: 20px;
                right: -300px;
                width: 280px;
                padding: 15px;
                background-color: white;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                border-radius: 6px;
                z-index: 9999;
                transition: right 0.3s ease;
                overflow: hidden;
            }

            .cart-notification.show {
                right: 20px;
            }

            .cart-notification.success {
                border-left: 4px solid #4CAF50;
            }

            .cart-notification.error {
                border-left: 4px solid #F44336;
            }

            .notification-content {
                display: flex;
                align-items: center;
            }

            .notification-icon {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 24px;
                height: 24px;
                border-radius: 50%;
                margin-right: 12px;
                font-weight: bold;
            }

            .success .notification-icon {
                background-color: rgba(76, 175, 80, 0.2);
                color: #4CAF50;
            }

            .error .notification-icon {
                background-color: rgba(244, 67, 54, 0.2);
                color: #F44336;
            }

            .notification-message {
                font-size: 14px;
                color: #333;
            }

            .notification-progress {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                width: 100%;
                background-color: #4CAF50;
            }

            .error .notification-progress {
                background-color: #F44336;
            }

            /* Animation du bouton panier */
            .add-to-cart {
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .add-to-cart.adding {
                opacity: 0.7;
                pointer-events: none;
            }

            .add-to-cart .cart-spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 16px;
                height: 16px;
                border: 2px solid rgba(255,255,255,0.3);
                border-top-color: #fff;
                border-radius: 50%;
                animation: spin 0.8s linear infinite;
                opacity: 0;
                visibility: hidden;
            }

            .add-to-cart.adding .cart-spinner {
                opacity: 1;
                visibility: visible;
            }

            .add-to-cart.adding ion-icon {
                opacity: 0;
            }

            @keyframes spin {
                to { transform: translate(-50%, -50%) rotate(360deg); }
            }

            /* Animation du compteur panier */
            #panier-count {
                transition: transform 0.3s ease;
            }

            #panier-count.pulse {
                animation: pulse 0.5s ease;
            }

            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.3); }
                100% { transform: scale(1); }
            }
        </style>
    `);

        // Ajouter le spinner à chaque bouton panier
        $('.add-to-cart').each(function() {
            $(this).append('<span class="cart-spinner"></span>');
        });

        // Fonction pour afficher une notification
        function showNotification(message, type) {
            // Supprimer toute notification existante
            $('.cart-notification').remove();

            // Créer la notification
            const notification = $(`
            <div class="cart-notification ${type}">
                <div class="notification-content">
                    <span class="notification-icon">${type === 'success' ? '✓' : '✕'}</span>
                    <span class="notification-message">${message}</span>
                </div>
                <div class="notification-progress"></div>
            </div>
        `);

            // Ajouter au corps du document
            $('body').append(notification);

            // Afficher la notification
            setTimeout(function() {
                notification.addClass('show');

                // Animer la barre de progression
                notification.find('.notification-progress').animate({
                    width: '0%'
                }, 3000);

                // Fermer après 3 secondes
                setTimeout(function() {
                    notification.removeClass('show');
                    setTimeout(function() {
                        notification.remove();
                    }, 300);
                }, 3000);
            }, 10);
        }

        // Animer l'icône du panier dans la navbar
        function animateCartIcon() {
            const cartIcon = $('#panier-count');
            cartIcon.addClass('pulse');

            setTimeout(function() {
                cartIcon.removeClass('pulse');
            }, 1000);
        }

        // Gérer le clic sur le bouton "Ajouter au panier"
        $('.add-to-cart').click(function(e) {
            e.preventDefault();

            var button = $(this);
            var produitId = button.data('id');
            var productQuantity = 1; // Par défaut à 1 si input non trouvé

            // Chercher l'input de quantité s'il existe
            if (button.siblings(".product-quantity").length) {
                productQuantity = button.siblings(".product-quantity").val();
            }

            // Ajouter la classe pour l'animation pendant la requête
            button.addClass('adding');

            $.ajax({
                url: '{{ route("ajouterpanier") }}', // Utiliser la syntaxe Blade originale
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}', // Utiliser la syntaxe Blade originale
                    'produit_id': produitId,
                    'quantite': productQuantity
                },
                success: function(response) {
                    // Mettre à jour le compteur de panier
                    if (response.panierCount) {
                        $('#panier-count').text(response.panierCount);
                        animateCartIcon();
                    }

                    // Montrer une notification de succès
                    showNotification('Produit ajouté au panier', 'success');

                    // Enlever la classe d'animation
                    button.removeClass('adding');
                },
                error: function(xhr) {
                    // Montrer une notification d'erreur
                    showNotification('Erreur lors de l\'ajout au panier', 'error');

                    // Enlever la classe d'animation
                    button.removeClass('adding');
                }
            });
        });
    });

</script>





</body>

</html>
