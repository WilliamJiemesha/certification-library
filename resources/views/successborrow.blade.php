<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Borrowed</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bookdetail.css') }}">
</head>

<body>
    {{-- Navigation Bar --}}
    @include('navbar')

    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <div class="bookTitle" style="font-size: 24px">
                    Successfully borrowed the book!
                </div>
                <div class="row mt-2">
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 mx-auto text-center">
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
                        <a href="" class="buttonContent text-center mx-auto " style="max-width: 166px">
                            <div class="button text-center">
                                Back to Catalogue
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
