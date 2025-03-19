@extends('admin.sidebar')
@section('content')
    <div >
        <main>
            <div class="header">
                <div class="left">
                    <h1> Les Commandes  </h1>



                    </ul>
                </div>

            </div>

            <!-- Insights -->
            <ul class="insights">


                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            20
                        </h3>
                        <p>Nbr Commande</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                              100 000 Fcfa
                        </h3>
                        <p>Caisse</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Nos Commandes</h3>
                        <a href="" >
                            <i class='bx bx-plus'></i>
                        </a>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Nom Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Statue</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commandes as $e)
                          <tr>
                              <td>{{$e->prenom_nom}}</td>
                              <td>{{$e->email}}</td>
                              <td>{{$e->telephone}}</td>
                              <td>{{$e->adresse}}</td>
                              <td>{{$e->statut}}</td>

                              <td class="d-flex gap-3">
                                  <a class="btn btn-primary" href="{{route('admin.editCommandes',$e->id)}}">Modifier</a>
                                  <form action="{{route('admin.deleteCommandes',$e->id)}}" method="POST">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger">Supprimer</button>
                                  </form>
                              <td>
                                  <a class="btn btn-primary" href="{{ route('admin.commandedetails', $e->id) }}">Détails</a>
                              </td>




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


@endsection
