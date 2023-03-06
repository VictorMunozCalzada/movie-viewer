 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
   <div class="container text-center">
     <h1 class="display-4 text-white animated slideInDown mb-4">Log In</h1>
     <nav aria-label="breadcrumb animated slideInDown">
       <ol class="breadcrumb justify-content-center mb-0">
         <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
         <li class="breadcrumb-item text-primary active" aria-current="page">Log In</li>
       </ol>
     </nav>
   </div>
 </div>
 <!-- Page Header End -->

 <!-- Donate Start -->
 <div class="container-fluid py-5">
   <div class="container">
     <div class="row g-5 align-items-center">
       <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
         <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Log In</div>
         <h1 class="display-6 mb-5">Welcome back!</h1>
         <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
       </div>
       <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
         <div class="h-100 bg-secondary p-5">
           <form action="/login" method="post">
             <div class="row g-3">
               <div class="col-12">
                 <p class="text-danger">User does not exists! Try again</p>
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
                 <a href="/register">
                   <p>If you don't have an account please click here to register.</p>
                 </a>
               </div>
               <div class="col-12">
                 <button type="submit" class="btn btn-primary px-5" style="height: 60px;">
                   Log In
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