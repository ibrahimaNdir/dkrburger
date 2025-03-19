@extends('admin.sidebar')



@section('content')
    <form action="{{route($produit->id ? 'admin.updateProduits' :'admin.saveProduits',$produit->id)}}" method="POST">
        @csrf
        @method($produit->id ? 'put' : 'post')
        <input name="id" value="{{ $produit->id  ? $produit->id : ''}}"  hidden >

        <label>Nom</label>
        <input type="text" name="nom" class="form-control   @error('nom') is-invalid  @enderror" value="{{ $produit->id  ? $produit->nom : old('nom')}}">
        @error('nom')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Descrption</label>
        <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" value="{{$produit->id ? $produit->descriptipn: old('description')}}">
        @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <label>Prix</label>
        <input type="number" name="prix" class="form-control" value="{{$produit->id ? $produit->prix : old('prix')}}">

        <label>Image</label>
        <input type="file" name="image" class="form-control" value="{{$produit->id ? $produit->prix : old('image')}}">




        <button type="submit">{{$produit->exists ? 'Modifier' : 'Ajouter'}}</button>
    </form>
@endsection
