<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyBlog Navbar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Navbar Background */
    .custom-navbar {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      padding: 14px 0;
      backdrop-filter: blur(10px);
    }

    /* Brand */
    .navbar-brand {
      font-size: 1.6rem;
      letter-spacing: 1px;
    }

    /* Menu */
    .nav-link {
      position: relative;
      margin: 0 12px;
      font-weight: 500;
      transition: 0.3s;
    }

    /* Hover warna */
    .nav-link:hover {
      color: #00d4ff !important;
    }

    /* Underline animasi */
    .nav-link::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0%;
      height: 2px;
      background: #00d4ff;
      transition: 0.3s;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* Active */
    .nav-link.active {
      color: #00d4ff !important;
    }

    /* Button */
    .btn {
      transition: 0.3s;
    }

    .btn:hover {
      transform: scale(1.07);
    }

    /* Shadow */
    .navbar {
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    /* Biar konten gak ketutup navbar */
    body {
      padding-top: 80px;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top custom-navbar">
  <div class="container">
    
    <!-- Logo -->
    <a class="navbar-brand fw-bold" href="#">MyBlog</a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('post') ?>">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
        </li>
      </ul>

      <!-- Login / Logout -->
      <div class="d-flex">
        <?php if (function_exists('logged_in') && logged_in()) : ?>
          <a href="<?= base_url('logout') ?>" class="btn btn-danger rounded-pill px-4 fw-semibold">
            Logout
          </a>
        <?php else: ?>
          <a href="<?= base_url('login') ?>" class="btn btn-outline-light rounded-pill px-4 fw-semibold">
            Login
          </a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</nav>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
