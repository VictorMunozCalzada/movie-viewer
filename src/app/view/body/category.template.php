   <div class="cover text-white text-center">
     <div class="category-container">
       <?php
        $image_alt_pair_array = array_map(null, $image_array, $alt_array);

        foreach ($image_alt_pair_array as [$image, $alt]) {
          echo "<img src='$image' alt='$alt' id='$alt'>" . PHP_EOL;
        }
        ?>
     </div>