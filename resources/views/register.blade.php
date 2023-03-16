<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Register - Listrik Biru</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="styles/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    
    <main class="form-signin w-100 m-auto">

        @if(session('error'))
            <div class="alert alert-danger">
                <b>Yeah!</b> {{session('error')}}
            </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            <b>Mantap Jiwa!</b> {{session('success')}}
        </div>
        @endif
        <form action="{{url('/action-register')}}" method="POST">
            <img class="mb-4" src="{{ asset('img/logo-listrik.png') }}" alt="" width="200" height="200">
            <h1 class="h3 mb-3 fw-normal">Register</h1>
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Input Nama" name="name" required>
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Input Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password" required>
                    <label for="floatingPassword">Konfirmasi Password</label>
                </div>
                <br>
                <div class="text-center">
                    <p>Sudah punya akun? <a class="text-primary" href="{{route('login')}}">Sign In</a></p>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </form>
    </main>
  </body>
</html>
