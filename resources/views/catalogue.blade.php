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
        @foreach ($bookCollection as $book)
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 mx-auto">
                <div class="bookCard text-center">
                    <a href="/catalogue/{{ $book->Id }}">
                        <img class="coverImage" src="{{ url('/book_covers/' . $book->ImageString) }}" alt="Book Cover"
                            width="166" height="256">
                        <div class="bookTitle mt-2">
                            {{ $book->Judul }}
                        </div>
                        <div class="bookAuthor">
                            <p>{{ $book->Author }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>



</body>
<script></script>

</html>
