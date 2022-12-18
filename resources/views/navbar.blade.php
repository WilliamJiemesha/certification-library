{{-- Navigation Bar --}}
<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand p-2" href="/">Library Catalogue</a>
    @if (session()->has('username'))
        <div class="authentication">
            <div class="navbar-brand">Hello, {{ session()->get('username') }}</div>
        </div>
    @else
        <div class="authentication">
            <a class="navbar-brand" href="/signup">Sign Up</a>
            <a class="navbar-brand" href="/login">Log In</a>
        </div>
    @endif
</nav>
