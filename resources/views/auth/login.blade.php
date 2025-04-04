
@extends('admin.sidebar')
@section('title',' Login')
@section('content')


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <form action="{{ route('auth.login') }}" method="POST" style="width: 300px; margin: 50px auto; padding: 20px; border-radius: 8px; background: #f9f9f9; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <h1 style="text-align: center; font-size: 24px; color: #333;">Login</h1>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; color: #555;">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            @error("email")
            <p style="color: red; font-size: 14px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; color: #555;">Password :</label>
            <input type="password" name="password"
                   style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            @error("password")
            <p style="color: red; font-size: 14px;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
            Connexion
        </button>
    </form>



@endsection
