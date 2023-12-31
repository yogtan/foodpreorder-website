<nav id="myNavbar" class="navbar navbar-expand-lg navbar-dark position-sticky">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/">
            <img src="/img/Logo_Pre-Order.svg" alt="LogoPre_Order" width="100" height="50" class="me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="/img/bars-solid.svg" class="navbar-top-icon">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="search-form form-inline my-2 my-lg-0 mx-auto">
                <div class="search-container w-100">
                    <img src="/img/icon_search.svg" alt="Search Icon" class="search-icon" width="25" height="25">
                    <input class="form-control w-100 ps-5 " type="search" placeholder="Pre-order makanan apa ya hari ini?" aria-label="Search">
                </div>
            </form>
            @auth
            <div class="history his-link">
                <a href="history" class="his-link">Purchase History</a>
            </div>
            <div class="btn-group position-relative">
                <button type="button" class="btn">Welcome, {{ auth()->user()->name }}</button>
                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu end-0 z-3">
                <li><a class="dropdown-item" href="/">Home</a></li>
                @if(auth()->user()->role == "merchant")
                <li><a class="dropdown-item" href="/penjual">Home Penjual</a></li>
                @elseif(auth()->user()->role == "Admin")
                <li><a class="dropdown-item" href="/Admin">Home Admin</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                </form>
                </li>
                </ul>
            </div>
            @else
                <div class="btn-container d-flex justify-content-center">
                    <button onclick="toggleDropdown()" class="btn">Masuk/Daftar</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="/login">Login</a>
                        <a href="/register-merchant" onclick="selectOption('Merchant')">Merchant</a>
                        <a href="/register" onclick="selectOption('Customer')">Customer</a>
                    </div>
                </div>
                @endauth
            </div>
        </div>
</nav>


@section("scripts")
<script>
    window.onclick = function(event) {
        if (!event.target.matches('.btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown");
        dropdown.classList.toggle("show");
    }

</script>
@endsection