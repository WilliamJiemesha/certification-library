<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
</head>

<body>
    {{-- Navbar --}}
    @include('navbar')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="loginContainer text-center mt-5">
                    <form action="" method="POST">
                        @csrf
                        <div class="formTitle">
                            Log In
                        </div>
                        <div class="username formContent plainFormInput mt-3">
                            <input type="text" placeholder="Enter your username here" name="username" required>
                        </div>
                        <div class="password formContent plainFormInput">
                            <input type="password" placeholder="Enter your password here" name="password" required
                                min="8" max="16">
                        </div>
                        <div class="submitButton formContent">
                            <input type="submit" value="Log In" class="button">
                        </div>
                    </form>
                    @if ($errors->any())
                        {!! implode(
                            '',
                            $errors->all('<div class="mt-2" style="color:red; font-size: 10; font-weight: bold">:message</div>'),
                        ) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
