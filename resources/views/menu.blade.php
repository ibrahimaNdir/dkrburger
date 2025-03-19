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

                                <button class="add-to-cart" data-id="{{ $article['id'] }}">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </button>
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

!-- jQery -->
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
    $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
            e.preventDefault();

            var produitId = $(this).data('id');
            var productQuantity = $(this).siblings(".product-quantity").val();

            $.ajax({
                url: '{{ route("ajouterpanier") }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'produit_id': produitId,
                    'quantite': productQuantity
                },
                success: function(response) {
                    // Mettre à jour le compteur de panier si nécessaire
                    if (response.panierCount) {
                        $('#panier-count').text(response.panierCount);
                    }

                    // Afficher un message de confirmation
                    alert('Produit ajouté au panier');
                },
                error: function(xhr) {
                    alert('Erreur lors de l\'ajout au panier');
                }
            });
        });
    });
</script>


</body>

</html>






