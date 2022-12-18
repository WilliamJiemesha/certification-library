{{-- Navigation Bar --}}
<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand p-2" href="/admin/log">Library Borrow Log</a>

    @if (session()->has('adminId'))
        <div class="authentication">
            <a class="navbar-brand" href="/admin/add/borrowings">Add Borrowings</a>
            <a class="navbar-brand" href="/admin/add/books">Add Books</a>
            <a class="navbar-brand" href="/admin/books">Books</a>
            <a class="navbar-brand" href="/admin/logout">Logout</a>
        </div>
    @else
        <div class="authentication">
            <a class="navbar-brand" href="/admin/login">Admin Login</a>
        </div>
    @endif

</nav>

<style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
