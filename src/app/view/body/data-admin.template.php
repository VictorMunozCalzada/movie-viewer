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
         <div class="col-10">
           <div class="bg-table p-5 rounded-3">
             <div class="card mask-custom rounded-3">
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table table-borderless text-white mb-0">
                     <thead>
                       <?php
                        echo "<thead>";
                        echo "<tr>";
                        foreach ($movies_table->header  as $title) {
                          echo "<th class='text-primary'>" . $title . "</th>";
                        }

                        echo "<th class='text-primary'>ACTIONS</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        foreach ($movies_table->body as $data) {
                          echo "<tr>";
                          foreach ($data as $row) {
                            echo "<td>" . $row
                              . "</td>";
                          }
                          echo "<td class='text-center'><i class='fa-solid fa-pen-to-square text-info pe-4'></i><i class='fa-solid fa-x text-danger'></i></td>";
                          echo "</tr> \n";
                        }
                        echo "</tbody>";
                        ?>
                   </table>
                 </div>
               </div>
             </div>
           </div>
           <br>
           <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
             <div class="h-100 bg-secondary p-5">
               <form method="post">
                 <div>
                   <label>
                     Film:
                     <input type="text" name="film" />
                   </label>
                   <label>
                     Genre:
                     <input type="text" name="genre" />
                   </label>
                   <label>
                     Lead Studio:
                     <input type="text" name="studio" />
                   </label>
                   <label>
                     Audience score %:
                     <input type="text" name="audience" />
                   </label>
                   <label>
                     Profitability:
                     <input type="text" name="profitability" />
                   </label>
                   <label>
                     Worldwide gross:
                     <input type="text" name="gross" />
                   </label>
                   <label>
                     Year:
                     <input type="text" name="year" />
                   </label>
                   <br>
                   <input type="radio" id="add" name="modify" value="add">
                   <label for="add">Add</label><br>
                   <input type="radio" id="delete" name="modify" value="delete">
                   <label for="delete">Delete</label><br>
                   <button type="submit">Modify</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Testimonial End -->