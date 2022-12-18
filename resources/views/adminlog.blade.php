<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="padding: 0; margin: 0">
    {{-- Navigation Bar --}}
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand p-2" href="/preview">Library Borrow Log</a>
    </nav>


    <div class="container">
        <table class="table table-striped text-center m-3">
            <thead>
                <tr>
                    <th scope="col">Borrower</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Release Year</th>
                    <th scope="col">Borrowed Date</th>
                    <th scope="col">Expected Return Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
