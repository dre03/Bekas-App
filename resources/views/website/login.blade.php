<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-center">Silahkan Login</h1>
        <form class="text-center" action="{{route('authUserlogin')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="">Username</label>
                <input type="text" name="username" required>
            </div>
            <div style="margin-top: 1rem;">
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-dark" style="margin-top: 1rem;" type="submit">Login</button> 
                <a href="{{route( 'redirectGoogle' ) }}" class="btn btn-dark ms-3"><i class="bi bi-google"></i></a>
            </div>
        </form>
        <div class="d-flex justify-content-center" style="margin-top: 2rem">
            <button>
                <a href="/register">Buat akun</a>
            </button>
            <button class="ms-2">
                <a href="{{route('home')}}">Back</a>
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>