 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
   <div class="container text-center">
     <h1 class="display-4 text-white animated slideInDown mb-4">Register</h1>
     <nav aria-label="breadcrumb animated slideInDown">
       <ol class="breadcrumb justify-content-center mb-0">
         <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
         <li class="breadcrumb-item text-primary active" aria-current="page">Register</li>
       </ol>
     </nav>
   </div>
 </div>
 <!-- Page Header End -->

 <!-- Donate Start -->
 <div class="container-fluid py-5">
   <div class="container">
     <div class="row g-5 align-items-center">
       <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
         <div class="h-100 bg-secondary p-5">
           <form action="/register" method="post">
             <div class="row g-3">
               <div class="col-12">
                 <div class="form-floating">
                   <input type="text" class="form-control bg-light border-0" name="username" placeholder="Username" required>
                   <label for="username">Username</label>
                 </div>
               </div>
               <div class="col-12">
                 <div class="form-floating">
                   <input type="password" class="form-control bg-light border-0" name="password" placeholder="Password" required>
                   <label for="password">Password</label>
                 </div>
               </div>
               <div class="col-12">
                 <button type="submit" class="btn btn-primary px-5" style="height: 60px;">
                   Register
                   <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                     <i class="fa fa-arrow-right"></i>
                   </div>
                 </button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Donate End -->