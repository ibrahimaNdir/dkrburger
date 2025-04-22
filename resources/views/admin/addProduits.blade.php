@extends('admin.sidebar')

<style>
    .page-wrapper {
        min-height: 100vh;
        padding: 30px;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .form-container {
        width: 100%;
        max-width: 500px;
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .form-title {
        color: #000;
        font-size: 22px;
        margin: 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #000;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #000;
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        outline: none;
    }

    .text-danger {
        color: #ff0000;
        font-size: 13px;
        display: block;
        margin-top: 5px;
    }

    .is-invalid {
        border-color: #ff0000;
    }

    .submit-btn {
        background-color: #000;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        width: 100%;
        margin-top: 25px;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #333;
    }

</style>



@section('content')
    <div class="page-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Ajouter un  Produit</h2>
            </div>

            <form action="{{route($produit->id ? 'admin.updateProduits' :'admin.saveProduits',$produit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($produit->id ? 'put' : 'post')
                <input name="id" value="{{ $produit->id  ? $produit->id : ''}}" hidden>

                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ $produit->id  ? $produit->nom : old('nom')}}">
                    @error('nom')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$produit->id ? $produit->description: old('description')}}">
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Prix</label>
                    <input type="number" name="prix" class="form-control" value="{{$produit->id ? $produit->prix : old('prix')}}">
                </div>

                <div class="form-group">

                    <label>Image</label>
                    <input type="file" name="image" class="form-control" >


                </div>

                <button type="submit" class="submit-btn">{{$produit->exists ? 'Modifier' : 'Ajouter'}}</button>
            </form>
        </div>
    </div>
@endsection
