 <!-- Page Header Start -->
 <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
   <div class="container text-center">
     <h1 class="display-4 text-white animated slideInDown mb-4">Data</h1>
     <nav aria-label="breadcrumb animated slideInDown">
       <ol class="breadcrumb justify-content-center mb-0">
         <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
         <li class="breadcrumb-item text-primary active" aria-current="page">Data</li>
       </ol>
     </nav>
   </div>
 </div>
 <!-- Page Header End -->


 <!-- Testimonial Start -->

 <div class="container-fluid py-5 h-100">
   <div class="mask d-flex align-items-center h-100">
     <div class="container-fluid">
       <div class="row text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
         <div class="col-12">
           <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Data</div>
           <h1 class="display-6 pb-5">Table</h1>
         </div>
       </div>
       <div class="row justify-content-center">
         <div class="col-md-10">
           <table class="table table-successs pb-5">
             <thead>
               <?php
                echo "<thead>";
                echo "<tr>";
                foreach ($movies_table->header  as $title) {
                  echo "<th class='text-primary'>" . $title . "</th>";
                }
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($movies_table->body as $data) {
                  echo "<tr>";
                  foreach ($data as $row) {
                    echo "<td>" . $row
                      . "</td>";
                  }
                  echo "</tr> \n";
                }
                echo "</tbody>";
                ?>
           </table>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 offset-md-4">
           <form class="p-4 mt-4 bg-secondary" method="post">
             <fieldset>
               <legend>Data Table Managment</legend>
               <div class="mb-3">
                 <label for="film" class="form-label"> Film Title:</label>
                 <input type="text" name="film" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="genre" class="form-label"> Genre:</label>
                 <input type="text" name="genre" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="studio" class="form-label"> Lead Studio:</label>
                 <input type="text" name="studio" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="audience" class="form-label"> Audience Score %:</label>
                 <input type="text" name="audience" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="profitability" class="form-label"> Profitability:</label>
                 <input type="text" name="profitability" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="gross" class="form-label"> Worldwide Gross:</label>
                 <input type="text" name="gross" class="form-control">
               </div>
               <div class="mb-3">
                 <label for="year" class="form-label"> Year:</label>
                 <input type="text" name="year" class="form-control">
               </div>
               <button type="submit" class="btn btn-primary">Add movie</button>
             </fieldset>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Testimonial End -->