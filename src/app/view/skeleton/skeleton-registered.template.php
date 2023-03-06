<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Movie Viewer</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="/../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="/../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="/../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="/../../css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
      <div class="col-lg-6 px-5 text-start">
        <small><i class="fa fa-map-marker-alt me-2"></i>Barcelona, ESP</small>
        <small class="ms-4"><i class="fa fa-envelope me-2"></i>services@movieviewer.com</small>
      </div>
      <div class="col-lg-6 px-5 text-end">
        <small>Username:</small>
        <?php echo "<span class='text-capitalize fw-bold'>$name</span>" ?>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="/" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="fw-bold text-primary m-0">Movie<span class="text-white">Viewer</span></h1>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="/" class="nav-item nav-link active">Home</a>
          <a href="/data" class="nav-item nav-link">Data</a>
          <a href="/blog" class="nav-item nav-link">Blog</a>
          <div class="nav-item dropdown">
            <a href="/gallery" class="nav-link dropdown-toggle" data-hover="dropdown">Gallery</a>
            <div class="dropdown-menu m-0">
              <a href="/gallery/action" class="dropdown-item">Action</a>
              <a href="/gallery/adventure" class="dropdown-item">Adventure</a>
              <a href="/gallery/animation" class="dropdown-item">Animation</a>
              <a href="/gallery/comedy" class="dropdown-item">Comedy</a>
              <a href="/gallery/drama" class="dropdown-item">Drama</a>
              <a href="/gallery/horror" class="dropdown-item">Horror</a>
            </div>
          </div>
          <a href="/web-service" class="nav-item nav-link">Billboard</a>
          <a href="/contact" class="nav-item nav-link">Contact</a>
        </div>
        <div class="d-none d-lg-flex ms-2">
          <a class="btn btn-outline-primary py-2 px-3" href="/index?action=logout">
            Log Out
            <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
              <i class="fa fa-arrow-right"></i>
            </div>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <!-- Body Templates  -->
  <?= $body ?>

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-white-50 footer pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h1 class="fw-bold text-primary mb-4">Movie<span class="text-white">Viewer</span></h1>
          <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Social Networks</h5>
          <div class="d-flex pt-2">
            <a class="btn btn-square me-1" href=""><i class="fab fa-google"></i></a>
            <a class="btn btn-square me-1" href=""><i class="fab fa-github"></i></a>
            <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Quick Links</h5>
          <a class="btn btn-link" href="/">Home</a>
          <a class="btn btn-link" href="/data">Data</a>
          <a class="btn btn-link" href="/blog">Blog</a>
          <a class="btn btn-link" href="/gallery">Gallery</a>
          <a class="btn btn-link" href="/web-service">Billboard</a>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-light mb-4">Newsletter</h5>
          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
          <div class="position-relative mx-auto" style="max-width: 400px;">
            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a href="#">Movie Viewer</a>, All Right Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/../../lib/wow/wow.min.js"></script>
  <script src="/../../lib/easing/easing.min.js"></script>
  <script src="/../../lib/waypoints/waypoints.min.js"></script>
  <script src="/../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/../../lib/parallax/parallax.min.js"></script>

  <!-- Template Javascript -->
  <script src="/../../js/main.js"></script>
</body>

</html>