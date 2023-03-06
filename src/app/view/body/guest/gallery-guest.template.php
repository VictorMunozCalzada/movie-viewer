<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Gallery</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Gallery</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Gallery</div>
            <h1 class="display-6 mb-5">Categories</h1>
        </div>
        <div class="row g-4">
            <?php
            $image_alt_pair_array = array_map(null, $image_array, $alt_array);

            foreach ($image_alt_pair_array as [$image, $alt]) {
                echo "<div class='col-lg-2 col-md-3 wow fadeInUp' data-wow-delay='0.3s'>";
                echo "<div class='team-item position-relative rounded overflow-hidden'>";
                echo "<div class='overflow-hidden'>";
                echo "<img class='img-fluid d-block m-auto' src='${image}' alt='${alt}'>";
                echo "</div>";
                echo "<div class='team-text bg-light text-center p-2'>";
                echo "<h5 class='text-capitalize'>${alt}</h5>";
                echo "<div class='team-social text-center'>";
                echo "<a class='btn btn-square' href='/gallery/${alt}'><i class='fa fa-arrow-right'></i></a>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
</div>
<!-- Team End -->