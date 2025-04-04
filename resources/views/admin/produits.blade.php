@extends('admin.sidebar')
@section('content')
    <div >
        <main>
            <div class="header">
                <div class="left">
                    <h1>Les Produits </h1>
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


                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            100 000 Fcfa
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
                        <h3>Nos Burgers </h3>
                        <a href="{{route('admin.addProduits')}}" >
                            <i class='bx bx-plus'></i>
                        </a>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produits as $e)
                            <tr>
                                <td>{{$e->nom}}</td>
                                <td>{{$e->description}}</td>
                                <td>{{$e->prix}}</td>
                                <td>
                                    <img src="{{ asset('storage/images/'. $e->image) }}  " width="500" >
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.editProduits',$e->id)}}">
                                            Modifier
                                        </a>
                                        <form action="{{route('admin.deleteProduits',$e->id)}}" method="POST" class="m-0">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                               Supprimer
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
