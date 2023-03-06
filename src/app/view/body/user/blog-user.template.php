 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
   <div class="container text-center">
     <h1 class="display-4 text-white animated slideInDown mb-4">Blog</h1>
     <nav aria-label="breadcrumb animated slideInDown">
       <ol class="breadcrumb justify-content-center mb-0">
         <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
         <li class="breadcrumb-item text-primary active" aria-current="page">Blog</li>
       </ol>
     </nav>
   </div>
 </div>
 <!-- Page Header End -->


 <!-- Testimonial Start -->
 <div class="container-xxl py-5">
   <div class="container">
     <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
       <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Blog</div>
       <h1 class="display-6 mb-5">Articles</h1>
     </div>
     <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
       <?php
        for ($i = 0; $i < count($blog_entry); $i++) {
          echo "<div class='testimonial-item text-center pb-2'>";
          echo "<div class='testimonial-text rounded text-center p-4'>";
          echo "<h5 class='pb-3'>{$blog_entry[$i]['title']}</h5>";
          echo "<p>{$blog_entry[$i]['text']}</p>";
          echo "</div>";
          echo "</div>";
        }
        ?>
     </div>
     <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
       <div class="h-100 bg-secondary p-5">
         <form method="post">
           <div class="row g-3">
             <div class="col-12">
               <div class="form-floating">
                 <input type="text" class="form-control bg-light border-0" name="title">
                 <label for="username">Title</label>
               </div>
             </div>
             <div class="col-12">
               <div class="form-floating">
                 <textarea rows="8" cols="41" name="text"></textarea>
               </div>
             </div>
             <button type="submit">Add article</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- Testimonial End -->