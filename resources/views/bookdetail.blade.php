<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bookdetail.css') }}">
</head>

<body>
    {{-- Navigation Bar --}}
    @include('navbar')

    <div class="container mt-5">
        <div class="row mx-auto">
            <div class="col-lg-2 col-md-4 col-xl-2 col-sm-4 text-end mb-5" style="max-width: 166px">
                <div class="row">
                    <div class="bookImage" style="padding: 0; margin: 0;">
                        <img class="coverImage" src="{{ url('/book_covers/' . $bookSelected->ImageString) }}"
                            alt="Book Cover" width="166px" height="256px">
                    </div>
                    <form action="/catalogue/postBorrowBook" method="POST" class="text-center mt-3">
                        @csrf
                        <input type="hidden" value="{{ $bookSelected->Id }}" name="id">
                        <input type="submit" class="buttonContent button" value="Borrow">
                    </form>
                </div>


            </div>
            <div class="col-lg-10 col-md-8 col-xl-10 col-sm-8">
                <div class="bookTitle">
                    {{ $bookSelected->Judul }}
                </div>
                <div class="bookAuthor">
                    {{ $bookSelected->Author }}
                </div>
                <div class="bookSummary">
                    <p class="descriptionTitle p-0 m-0 mt-3">Summary</p>
                    <p class="descriptionContent">{{ $bookSelected->Summary }}</p>
                </div>
                <div class="releaseYear">
                    <p class="descriptionTitle p-0 m-0 mt-3">Release Year</p>
                    <p class="descriptionContent">{{ $bookSelected->ReleaseYear }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
