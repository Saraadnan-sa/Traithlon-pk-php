<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traithlon PK</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="icon" href="./images/favicon.png" type="image/x-icon">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>
  <!-- <header>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('blog') }}">Blogs</a>
            <a href="{{ route('services.index') }}">Services</a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('services.create') }}">Add Service</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
                @endauth
        </nav>
    </header> -->

  <header>
    <div class="navbar">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Gym Logo" />
      </div>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('blog') }}">Blogs</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
        @auth
        @if(auth()->user()->role === 'admin')
        <li><a href="{{ route('services.create') }}">Add Service</a></li>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <li><button type="submit">Logout</button></li>
        </form>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        @endauth

      </ul>
    </div>
    <hr />
    <div class="button-container">
      <button id="toggleTheme" class="Theme-btn" onclick="toggleTheme()">
        Change Theme
      </button>
      <button id="changeTextStyle" class="style-btn">
        Change Text Style
      </button>
      <button id="resetTextStyle" class="style-btn">Reset Text Style</button>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3>About Us</h3>
        <p>
          We are committed to providing the best fitness training services to
          help you achieve your goals.
        </p>
      </div>
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>Email: Triathlon@fitnessstudio.com</p>
        <p>Phone: 051-7654321</p>
        <p>Address: Apartment basement, Multan Cantt</p>
      </div>
      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="about.html">Trainers</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Follow Us</h3>
        <div class="social-icons">
          <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 Fitness Studio. All Rights Reserved.</p>
    </div>
  </footer>


  <script src="{{ asset('js/script.js') }}"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>