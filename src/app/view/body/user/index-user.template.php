    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="/img/carousel-1.jpg" alt="Image">
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-7 pt-5">
                    <h1 class="display-4 text-white mb-3 animated slideInDown">Welcome
                      <?php
                      echo $name
                      ?>
                      ! Check The Billboard</h1>
                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">Find the latest and trending movies avaliable now.</p>
                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="/web-service">
                      Go to billboard
                      <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="img/carousel-2.jpg" alt="Image">
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-7 pt-5">
                    <h1 class="display-4 text-white mb-3 animated slideInDown">Check The Gallery</h1>
                    <p class="fs-5 text-white-50 mb-5 animated slideInDown">We have a big album of different categories.</p>
                    <a class="btn btn-primary py-2 px-3 animated slideInDown" href="/gallery">
                      Go to gallery
                      <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                        <i class="fa fa-arrow-right"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
              <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">About Us</div>
              <h1 class="display-6 mb-5">A Movie Platform For Movies Fans</h1>
              <div class="bg-light border-bottom border-5 border-primary rounded p-4 mb-4">
                <p class="text-dark mb-2">Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet lorem sit clita duo justo erat amet</p>
                <span class="text-primary"><strong>Mostafa Abdel</strong> - Founder & <strong>Victor Muñoz</strong> - Founder</span>
              </div>
              <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
              <a class="btn btn-outline-primary py-2 px-3" href="/contact">
                Contact Us
                <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                  <i class="fa fa-arrow-right"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->