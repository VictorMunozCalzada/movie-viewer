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

     <div class="row">
       <div class="col-md-6 offset-md-3">
         <form class="p-4 mt-4 bg-secondary" method="post">
           <fieldset>
             <legend>Blog Managment</legend>
             <div class="mb-3">
               <label for="title" class="form-label"> Title:</label>
               <input type="text" name="title" class="form-control">
             </div>
             <div class="mb-3">
               <textarea class="form-control" placeholder="Content..." name="text"></textarea>
             </div>
             <div class="mb-3">
               <div class="form-check">
                 <input class="form-check-input" type="radio" id="add" name="modify" value="add">
                 <label class="form-check-label" for="add">
                   Add
                 </label>
               </div>
               <div class="form-check">
                 <input class="form-check-input" type="radio" id="delete" name="modify" value="delete">
                 <label class="form-check-label" for="delete">
                   Delete
                 </label>
               </div>
             </div>
             <button type="submit" class="btn btn-primary">Modify</button>
           </fieldset>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- Testimonial End -->