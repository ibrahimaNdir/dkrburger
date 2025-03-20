

@section('content')


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <h1>Login</h1>
        <div>
            <label for="name">Email:</label>
            <input type="email"  name="email" value="{{old('title')}}"  ><br><br>

            @error("email")
            {{ $message }}
            @enderror

        </div>
        <div>
            <label for="message">Password :</label>
            <input type="password"  name="password"  ><br><br>

            @error("password")
            {{ $message }}
            @enderror
        </div>

        <button type="submit">
            Connexion
        </button>
    </form>



@endsection
