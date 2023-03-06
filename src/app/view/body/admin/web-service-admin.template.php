 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
     <div class="container text-center">
         <h1 class="display-4 text-white animated slideInDown mb-4">Billboard</h1>
         <nav aria-label="breadcrumb animated slideInDown">
             <ol class="breadcrumb justify-content-center mb-0">
                 <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                 <li class="breadcrumb-item text-primary active" aria-current="page">Billboard</li>
             </ol>
         </nav>
     </div>
 </div>
 <!-- Page Header End -->


 <!-- Testimonial Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
             <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Billboard</div>
             <h1 class="display-6 mb-5">Trending</h1>
         </div>
         <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
             <?php
                foreach ($movies_array as $item) {
                    echo "<div class='testimonial-item text-center pb-2'>";
                    if (array_key_exists('title', $item)) echo "<img src='https://image.tmdb.org/t/p/w500{$item['poster_path']}' alt='{$item['title']}'/'> <br>";
                    else echo "<img src='https://image.tmdb.org/t/p/w500{$item['poster_path']}' alt='{$item['name']}'/'> <br>";
                    echo "</div>";
                }
                ?>
         </div>
     </div>
 </div>
 <!-- Testimonial End -->