<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/card.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/create.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/detail-order.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/error.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tables.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a class="navbar-brand">Aplikasi Restoran</a>
            
            <button class="navbar-toggler" id="navToggle" aria-label="Toggle navigation">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>

            @if (Auth::check())
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link">Order</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('menu.index') }}" class="nav-link">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="profileBtn">Profile</a>
                    </li>
                    <!-- Profile Pop-up -->
                    <div id="profilePopup" class="profile-popup">
                        <p>Welcome, {{ Auth::user()->username }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <a href="{{ route('profile.edit') }}" class="nav-link">Edit Profile</a>
                        <a href="{{ route('logout') }}" class="nav-link">Log Out</a>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ ('login') }}" class="nav-link">Login</a>
                        </li>

                        @endif
                


                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container-top">
            @yield('content')
        </div>
    </main>
    
    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profilePopup = document.getElementById('profilePopup');
        const closeProfile = document.getElementById('closeProfile');
    
        // Toggle the profile popup
        profileBtn.addEventListener('click', () => {
            profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
        });
    
        // Close the popup when the close button is clicked
        closeProfile.addEventListener('click', () => {
            profilePopup.style.display = 'none';
        });
    
        // Close the popup if clicked outside
        document.addEventListener('click', (e) => {
            if (!profilePopup.contains(e.target) && e.target !== profileBtn) {
                profilePopup.style.display = 'none';
            }
        });
    </script>
</body>
</html>