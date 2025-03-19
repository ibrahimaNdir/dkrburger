@extends('admin.sidebar')
@section('content')
    <div >
        <main>
            <div class="header">
                <div class="left">
                    <h1>Les Achat </h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shop</a></li>
                    </ul>
                </div>

            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            1,074
                        </h3>
                        <p>Paid Order</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Les Achats </h3>

                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Quantite</th>
                            <th>Sous Total</th>
                            <th>Total</th>
                            <th>ID Commande</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $e)
                            <tr>
                                <td>{{$e->nom}}</td>
                                <td>{{$e->prix}}</td>
                                <td>{{$e->quantite}}</td>
                                <td> {{$e->sous_total}}</td>
                                <td>{{$e->total}}</td>
                                <td>{{$e->commande_id ??''}}</td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <form action="{{route('admin.deleteProduits',$e->id)}}" method="POST" class="m-0">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>



            </div>

        </main>

    </div>

    <script src="index.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>


@endsection
