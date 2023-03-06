<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container text-center">
    <h1 class="display-4 text-white animated slideInDown mb-4">Categories</h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
        <li class="breadcrumb-item"><a class="text-white" href="/gallery">Gallery</a></li>
        <li class="breadcrumb-item text-primary text-capitalize active" aria-current="page"><?php echo $category ?></li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Category</div>
      <h1 class="display-6 mb-5 text-capitalize"><?php echo $category ?></h1>
    </div>
    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
      <?php
      $image_alt_pair_array = array_map(null, $image_array, $alt_array);

      foreach ($image_alt_pair_array as [$image, $alt]) {
        echo "<div class='testimonial-item text-center pb-2'>";
        echo "<div class='testimonial-text rounded text-center p-4'>";

        echo "<img class='img-fluid d-block m-auto' src='$image' alt='$alt'>";

        echo "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>
</div>
<!-- Testimonial End -->