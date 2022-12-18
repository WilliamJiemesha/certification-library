<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Edit Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
</head>

<body>
    {{-- Navigation Bar --}}
    @include('navbaradmin')

    {{-- Add borrowing form --}}
    <div class="container text-center" style="max-width: 700px">
        <form action="/admin/edit/books" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $book->id }}" name="id">
            <div class="formTitle">
                Edit Book
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="name" class="col-form-label">Book Title</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" name="title" placeholder="Add book title" value="{{ $book->title }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">Book Author</label>
                </div>
                <div class="col-6 text-start">
                    <input type="text" name="author" placeholder="Add book author" value="{{ $book->author }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">Book Summary</label>
                </div>
                <div class="col-6 text-start">
                    <textarea name="summary" id="" cols="30" rows="10">{{ $book->summary }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">Book Release Year</label>
                </div>
                <div class="col-6 text-start">
                    <input type="number" name="release_year" placeholder="Add book release year"
                        value="{{ $book->release_year }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">New Book Cover Image</label>
                </div>
                <div class="col-6 text-start">
                    <input type="file" name="cover" accept="image/*">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="Apply Edit">
                </div>
                <div class="col">
                    <button class="btn" style="background: red; color: white" type="button"
                        onclick="deleteBook('{{$book->id}}')">Delete</button>
                </div>
            </div>
        </form>
    </div>

</body>
<script>
    function deleteBook(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('/admin/edit/books/delete') }}",
            data: {
                id: id
            },
            success: function(response) {
                window.location.replace("/admin/log");
            }
        })
    }
</script>

</html>
