<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Catalogue</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/librarycatalogue.css') }}">
</head>

<body>
    {{-- Navigation Bar --}}
    @include('navbar')

    {{-- Book Catalogue --}}
    <div class="row mt-5">
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 mx-auto">
            <div class="bookCard text-center">
                <a href="">
                    <img class="coverImage" src="{{ url('/book_covers/white_fang.jpg') }}" alt="Book Cover"
                        width="166" height="256">
                    <div class="bookTitle mt-2">
                        White Fang
                    </div>
                    <div class="bookAuthor">
                        <p>Jack London</p>
                    </div>
                </a>
            </div>
        </div>
    </div>



</body>

</html>
