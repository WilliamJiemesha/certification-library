<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Borrowings</title>
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
        <form action="" method="POST">
            @csrf
            <div class="formTitle">
                Add Borrowings
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="name" class="col-form-label">Names</label>
                </div>
                <div class="col-6 text-start">
                    <select name="name" class="names" id="selection_names" required>
                        @foreach ($names as $name)
                            <option value="{{ $name->id }}">{{ $name->username }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">Book</label>
                </div>
                <div class="col-6 text-start">
                    <select name="book" class="book" id="selection_books" required>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-start">
                    <label for="book" class="col-form-label">Borrow Date</label>
                </div>
                <div class="col-6 text-start">
                    <input type="date" name="tanggal_pinjam" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('#selection_names').selectize({
            create: false,
            sortField: 'text'
        });
        $('#selection_books').selectize({
            create: false,
            sortField: 'text'
        });
    });
</script>

</html>
