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

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/1462be1371.js" crossorigin="anonymous"></script>
    <!-- font awesome style -->
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

<div class="containerss">
    <!-- Stepper -->
    <div class="stepper">
        <div class="step active">
            <div class="step-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="step-label">En Attente </div>
        </div>
        <div class="stepper-connector"></div>
        <div class="step">
            <div class="step-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="step-label">En préparation</div>
        </div>
        <div class="stepper-connector"></div>
        <div class="step">
            <div class="step-icon">
                <i class="fas fa-truck"></i>
            </div>
            <div class="step-label">Prete</div>
        </div>
        <div class="stepper-connector"></div>
        <div class="step">
            <div class="step-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="step-label">Payer</div>
        </div>
    </div>

    <!-- Alert -->
    <div class="alert">
        Les champs précédés de * sont obligatoires.
    </div>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-container">
        <!-- Delivery Form -->
        <div class="delivery-form">
            <form action="{{route($commande->id ? 'admin.updateCommandes' :'admin.saveCommandes',$commande->id)}}" method="POST">

                @csrf
                <div class="form-section">
                    <div class="section-header">
                        <span class="section-number">1</span>
                        <span class="section-title">Information Client </span>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label>Prenom Nom <span class="required">*</span></label>
                            <input type="text" name="prenom_nom" value="{{ old('prenom_nom') }}" placeholder="Ex:Cheikh BA" required>
                        </div>
                        <div class="form-field">
                            <label>Telephone<span class="required">*</span></label>
                            <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="Telephone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-field">
                            <label>Email<span class="required">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@exemple.sn" required>
                        </div>
                        <div class="form-field">
                            <label>Adresse<span class="required">*</span></label>
                            <input type="text" name="adresse" value="{{ old('adresse') }}" placeholder="Ex: Pikine" required>
                        </div>
                    </div>

                    <!-- Hidden field for statut -->
                    <input type="hidden" name="statut" value="En Attente">

                    <button type="submit" class="order-button">Passer Commande</button>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <div class="summary-title">Votre commande</div>
            @php $total = 0 @endphp
            @if(session('panier'))
                @php
                    $total = 0 ;
                    $soustotal = 0;
                @endphp
                @foreach(session('panier') as $id => $item)
                    @php
                        $soustotal = $item['prix'] * $item['quantite'] ;
                        $total += $soustotal ;
                    @endphp

                    <div class="product-item">
                        <div>{{$item['quantite']}} X  </div>
                        <div> {{ $item['nom'] }}</div>
                    </div>

                    <div class="summary-line">
                        <div>Sous Total</div>
                        <div> {{ $soustotal}} Fcfa</div>
                    </div>
                @endforeach

                <div class="total-line">
                    <div>Total</div>
                    <div>{{ $total }}FCFA </div>
                </div>
            @else
                <div class="empty-cart">
                    Votre panier est vide
                </div>
            @endif
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

</body>
</html>
