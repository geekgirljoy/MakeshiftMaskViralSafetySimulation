<?php

////////////////////////////////////////////////////
// Settings and Definitions - DO NOT CHANGE THESE //
////////////////////////////////////////////////////

ini_set("max_execution_time", "-1"); // No Time Limit
ini_set('memory_limit','-1');        // No Memory Limit
set_time_limit(0);                   // DAMMIT JIM, I SAID NO TIME LIMIT!!!!!

// Define fabric mesh simulation methods:
define("USE_MESH_SIEVE_MICRON", 0);
define("USE_THREAD_COUNT", 1);

// Define thread thickness methods:
define("USE_THREAD_SIZE_MICRON", 0);
define("USE_THREAD_SIZE_DENIER", 1);
define("USE_THREAD_SIZE_TEX", 2);

// Define Cell Types:
define("FABRIC_WEFT", 1);    // Horizontal Threads
define("FABRIC_WARP", 2);    // Vertical Threads


///////////////////////////////////
// Change Below This Line    ////////////////////////////////////
///////////////////////////////////


///////////////////////////////////
// Simulation Characteristics    //
///////////////////////////////////
$simulation_square_size_inches = 0.1; // Base unit of measure in this simulation
                                      // is the micron (1/1000000 meters).
                                      // 1 micron is about ~0.0000393701 inches (smaller than you can see`)
                                      // for reference, human hair is between 15 to 180 microns.
                                      // 1 pixel = 1 micron
                                      // Because this is a very fine resolution, running
                                      // simulations at larger than 1" (squared) requires serious 
                                      // computation and time. Though it is possible to 
                                      // run a simulation smaller than 1" (i.e 0.05 or 0.25) if you lack
                                      // sufficient computation to run a larger simulation.
                                      //
                                      // You might need a 64 Bit OS + PHP to run most 
                                      // of these simulation sizes:
                                      //
                                      // 0.01 = 64516 microns square or 254 x 254 px
                                      // 0.02 = 258064 microns square or 508 x 508 px
                                      // 0.03 = 580644 microns square or 762 x 762 px
                                      // 0.04 = 1032256 microns square or 1016 x 1016 px
                                      // 0.05 = 1612900 microns square or 1270 x 1270 px
                                      // 0.06 = 2322576 microns square or 1524 x 1524 px
                                      // 0.07 = 3161284 microns square or 1778 x 1778 px
                                      // 0.08 = 4129024 microns square or 2032 x 2032 px
                                      // 0.09 = 5225796 microns square or 2286 x 2286 px
                                      // 0.10 = 6451600 microns square or 2540 x 2540 px
                                      // 0.25 = 40322500 microns square or 6350 x 6350 px
                                      // 0.50 = 161290000 microns square or 12700 x 12700 px
                                      // 0.75 = 362902500 microns square or 19050 x 19050 px                  
                                      // 1.00 = 645160000 microns square or 25400 x 25400 px
                                      // 2.00 = 2580640000‬ microns square or 50800‬ x 50800‬ px
                                      // 3.00 = 5806440000‬ microns square or 76200‬ x 76200‬ px
                                      // 4.00 = 10322560000 microns square or 101600 x 101600 px
                  

///////////////////////////////////
// Fabric Characteristics        //
///////////////////////////////////

// What method should be used to simulate the fabric mesh?
// If you know the exact U.S. Mesh/Sieve size in microns ( μm ) for the fabric you are using,
// Reference the table on this wiki article: (   https://en.wikipedia.org/wiki/Mesh_(scale)   )
// Then you should prefer to use that value because it will generally be more accurate.
// Thread count is somewhat less accurate (though it should be generally sufficient) because
// it infers the mesh size from the number of threads per inch.
$fabric_simulation_method = USE_THREAD_COUNT;  // Options: 
                                               // USE_MESH_SIEVE_MICRON
                                               // USE_THREAD_COUNT

// If you are using USE_MESH_SIEVE_MICRON define the mesh opening in microns
// If you are using USE_THREAD_COUNT define the mesh opening using thread count
// This lets us compute the number of warp and weft threads.


// Reference these wiki articles:
// https://en.wikipedia.org/wiki/Units_of_textile_measurement#Units
/*
In the United States cotton counts between 1 and 20 are referred to as coarse counts.
A regular single-knit T-shirt can be between 20 and 40 count; 
fine bed sheets are usually in the range of 40 to 80 count. 
The number is now widely used in the staple fiber industry.
*/
$fabric_mesh_size_microns_or_thread_count = 60; // 60 Thread Count
                          

// Reference these wiki articles:
// https://en.wikipedia.org/wiki/Units_of_textile_measurement
// https://en.wikipedia.org/wiki/Units_of_textile_measurement#Denier
// https://en.wikipedia.org/wiki/Units_of_textile_measurement#Linear_density
$thread_thickness_method = USE_THREAD_SIZE_DENIER; // Options: 
                           // USE_THREAD_SIZE_MICRON
                           // USE_THREAD_SIZE_DENIER
                           // USE_THREAD_SIZE_TEX
                           
// Enter thread size as microns, denier or tex based on selected method
$thread_size_micron_denier_tex = 30;
$fiber_density_grams_per_millileter = 1.5; // only necessary if using denier or tex


///////////////////////////////////
// Sneeze Caracteristics         //
///////////////////////////////////

// Per this wiki article: https://en.wikipedia.org/wiki/Lung_volumes
// The average total lung capacity of an adult human male is about 6 Liters of air. 
$lung_volume_Liters = 6;


// Per this wiki article: https://en.wikipedia.org/wiki/Sneeze 
// A sneeze can produce 40,000 droplets.
// Per this article: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4676262/
/*
Edwards et al.(14) tested 11 healthy subjects and reported that the concentration of particles in their exhaled breath varied from 1 particle/liter to over 10,000 particles/liter. Fabian et al.(11) tested 10 patients with influenza and found that the concentration of particles exhaled by these subjects ranged from 67 to 8500 particles/liter of air; similar results were later reported for patients with rhinovirus infections.
*/
// Same article:
/*
 The average number of particles expelled per cough varied widely from patient to patient, ranging from 900 to 302,200 particles/cough while subjects had influenza and 1100 to 308,600 particles/cough after recovery. 
*/
$minimum_droplets_per_liter = 8500; // 8500 droplets * 6 liters of air = 51000 total droplets in sneeze
$maximum_droplets_per_liter = 15000; // 15000 droplets * 6 liters of air = 90000 total droplets in sneeze


// sneeze spread as sneeze spread a standard_deviation
// https://en.wikipedia.org/wiki/Standard_deviation
$sneeze_spread  = 500;


// Per this wiki article: https://en.wikipedia.org/wiki/Sneeze
// aerosol droplets, commonly ranging from 0.5 to 5 µm.
//
// Per this article: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4676262/
/*
an average of 63% of the cough aerosol particle volume that was detected was in the respirable particle fraction while the subject had influenza (SD 22%). Cough aerosols have a much broader size range(8,9) than was covered by our instrument (0.35 to 10 μm), and thus our data do not mean that 63% of the entire cough aerosol was in the respirable fraction.

However, our results do show that a substantial volume of cough aerosol particles are produced that are in the respirable fraction, and thus potentially capable of reaching the alveolar region of the lungs. It is also interesting to compare this result with other reports of the sizes of influenza-laden airborne particles; a study of cough aerosols collected from influenza patients found that 65% of the influenza virus RNA was contained in particles in the respirable size fraction,(12) and two previous studies of airborne particles in a hospital emergency department(20) and an urgent care clinic(21) found that 53% and 42% of the influenza virus RNA was in particles in the respirable size fraction. Taken together, these studies all suggest that a substantial portion of the airborne particles containing influenza that are expelled by patients are in the respirable size range and support the hypothesis that influenza could in fact be transmitted by the airborne route.
*/
$respirable_aerosol_droplet_minimum_size_microns = 0.5;
$respirable_aerosol_droplet_maximum_size_microns = 5;
$maximum_droplet_size_microns = 10;
$percentage_of_respirable_droplets = 0.33; // 33%
$percentage_of_virus_in_particles = 0.50; // 50%


///////////////////////////////////
// Virus Characteristics         //
///////////////////////////////////

// size
// According to this wiki article:  https://en.wikipedia.org/wiki/Coronavirus
//  The diameter of the virus particles is around 120 nm. (0.12 Microns)
$virus_size_microns = 0.12;


///////////////////////////////////
// Change Above This Line    ////////////////////////////////////
///////////////////////////////////
///////////////////////////////////
// Do Not Change Below This Line ////////////////////////////////////
///////////////////////////////////


///////////////////////////////////
// Functions                     //
///////////////////////////////////

// Using this process: https://www.ehow.com/how_7619259_convert-denier-micron.html
function ConvertDenierToMicron($denier, $fiber_density_grams_per_millileter){

  // Divide the denier of the fiber by the density of the fiber. 
  $m = $denier / $fiber_density_grams_per_millileter;
  
  // Take the square root of that number. 
  $m = sqrt($m);
  
  // Multiply the square root by 11.89. 
  return $m * 11.89; // This will give you the diameter in microns.
}
// Example:
// echo ConvertDenierToMicron(2, 1.5); // 13.729389401329


// This function converts Tex to Denier and then Denier to Microns
function ConvertTexToMicron($tex, $fiber_density_grams_per_millileter){
  // 1 tex = 9 Denier
  // 2 tex = 18 Denier
  // tex * 9 = Denier
  return ConvertDenierToMicron($tex * 9, $fiber_density_grams_per_millileter);
}


// Marsaglia polar method for generating gaussian distribution
// based on example C++ code available on wikipedia
// https://en.wikipedia.org/wiki/Marsaglia_polar_method
function generateGaussian($min, $max, $standard_deviation){
  do {
    $u = (float)mt_rand() / (float)mt_getrandmax() * 2 - 1;
    $v = (float)mt_rand() / (float)mt_getrandmax() * 2 - 1;
    $s = $u * $u + $v * $v;
  } while ($s >= 1 || $s == 0);
    
  $s = sqrt(-2 * log($s) / $s);

  $spare = $v * $s;
  return (($max + $min) / 2) + $standard_deviation * $u * $s;
}


///////////////////////////////////
// Compute Values                //
///////////////////////////////////

echo "Computing values ...";

// How big is the simulation?
// An inch is ~25400 microns wide, calculate simulation dimensions
$simulation_size = round($simulation_square_size_inches * 25400);


// Compute thread thickness from method and input
if($thread_thickness_method == USE_THREAD_SIZE_MICRON){
  $fabric_thread_size_microns = round($thread_size_micron_denier_tex);
}
elseif($thread_thickness_method == USE_THREAD_SIZE_DENIER){
  $fabric_thread_size_microns = round(ConvertDenierToMicron($thread_size_micron_denier_tex, $fiber_density_grams_per_millileter));
}
elseif($thread_thickness_method == USE_THREAD_SIZE_TEX){
  $fabric_thread_size_microns = round(ConvertTexToMicron($thread_size_micron_denier_tex, $fiber_density_grams_per_millileter));
}


// Calculate thread margin size from microns as pixels
// minus 1 for the center pixel/cell/thread core then divide value into 2
$thread_margin = round(($fabric_thread_size_microns - 1) / 2); 


// Compute fabric mesh size from method and input
if($fabric_simulation_method == USE_MESH_SIEVE_MICRON){
  $fabric_mesh_size_microns = $fabric_mesh_size_microns_or_thread_count; // compute from method and input
}
elseif($fabric_simulation_method == USE_THREAD_COUNT){
  $fabric_mesh_size_microns = round(25400 / $fabric_mesh_size_microns_or_thread_count) / 2;
  
}


// Decide how many droplets for the sneeze and 
$number_of_droplets_per_liter = mt_rand($minimum_droplets_per_liter, $maximum_droplets_per_liter);

// Calculate the total number of droplets for the specified lung volume
if($simulation_square_size_inches < 1){
  // Scale droplet quantity for simulation
  // This proportionally reduces the number of droplets for the sim in a way that you could 
  // use the results of a smaller sim to compute "guesstimates" for larger simulations
  $number_of_droplets = round($simulation_square_size_inches * ($number_of_droplets_per_liter * $lung_volume_Liters));
}
else{
  // No scaling necessary, use full lung and sneeze capacity
  $number_of_droplets = round($number_of_droplets_per_liter * $lung_volume_Liters);
}

echo " done!" . PHP_EOL;


///////////////////////////////////
// Generate Fabric               //
///////////////////////////////////

echo "Generating fabric... ";
$fabric = array();

// Simulate the fabric weave using mesh/sieve settings
if($fabric_simulation_method == USE_MESH_SIEVE_MICRON){
  for($i = 0; $i < $simulation_size; $i++){ // Rows
    for($k = 0; $k < $simulation_size; $k++){ // Cols
      
      /////////////////////////////////////////////////
      // Determine if this cell is covered by fabric //
      /////////////////////////////////////////////////
      
      // If this cell is the center of a horizontal (weft) thread
      // convert cells to fabric
      if($i % $fabric_mesh_size_microns == 0){
        
        @$fabric[$i][$k] = FABRIC_WEFT;
        
        // Add thread above
        for($t = $i - $thread_margin; $t < $i; $t++){
          @$fabric[$t][$k] = FABRIC_WEFT;
        }
        
        // Add thread below
        for($t = $i + $thread_margin; $t > $i; $t--){
          @$fabric[$t][$k] = FABRIC_WEFT;
        }
      }
      
      // If this cell is the center of a vertical (warp) thread
      // convert cells to fabric
      if($k % $fabric_mesh_size_microns == 0){

        @$fabric[$i][$k] = FABRIC_WARP;
        
        // Add thread to the left
        for($t = $k - $thread_margin; $t < $k; $t++){
          @$fabric[$i][$t] = FABRIC_WARP;
        }
        
        // Add thread to the right
        for($t = $k + $thread_margin; $t > $k; $t--){
          @$fabric[$i][$t] = FABRIC_WARP;
        }
      }
      
    } // Cols
  } // Rows
} // USE_MESH_SIEVE_MICRON

elseif($fabric_simulation_method == USE_THREAD_COUNT){  
  for($i = 0; $i < $simulation_size; $i+=$fabric_mesh_size_microns){ // Rows  
    for($k = 0; $k < $simulation_size; $k+= $fabric_mesh_size_microns){ // Cols
    
       // If this cell is the center of a horizontal (weft) thread
      // convert cells to fabric
      for($r = 0; $r <= $simulation_size; $r++){
        
        @$fabric[$i][$r] = FABRIC_WEFT;
        
        // Add thread above
        for($t = $i - $thread_margin; $t < $i; $t++){
          @$fabric[$t][$r] = FABRIC_WEFT;
        }
        
        // Add thread below
        for($t = $i + $thread_margin; $t > $i; $t--){
          @$fabric[$t][$r] = FABRIC_WEFT;
        }
      }
      
      // If this cell is the center of a vertical (warp) thread
      // convert cells to fabric
      for($c = 0; $c <= $simulation_size; $c++){
        
        @$fabric[$c][$t] = FABRIC_WARP;
        
        // Add thread above
        for($t = $k - $thread_margin; $t < $k; $t++){
          @$fabric[$c][$t] = FABRIC_WARP;
        }
        
        // Add thread below
        for($t = $k + $thread_margin; $t > $k; $t--){
          @$fabric[$c][$t] = FABRIC_WARP;
        }
      }
    }
  }
  
  
} // USE_THREAD_COUNT

echo " done!" . PHP_EOL;


///////////////////////////////////
// Generate Snot Rockets         //
///////////////////////////////////

echo "Generate sneeze...";
$droplets = array();

$total_number_of_virus_particles = 0;
for($i = 0; $i < $number_of_droplets; $i++){
  
  // X & Y positions are a normal gaussian distribution
  $x = generateGaussian(0, $simulation_size, $sneeze_spread);
  $y = generateGaussian(0, $simulation_size, $sneeze_spread);  
  
  $droplet_size = mt_rand(1, 100); // Roll D100 
  
  // small respirable aerosol droplet
  if($droplet_size <= ($percentage_of_respirable_droplets * 100)){
    $droplet_size = mt_rand($respirable_aerosol_droplet_minimum_size_microns, $respirable_aerosol_droplet_maximum_size_microns);
  }
  else{ // droplet too large to aerosolize
    $droplet_size = mt_rand($respirable_aerosol_droplet_maximum_size_microns + 1, $maximum_droplet_size_microns);
  }
  
  $number_of_virus_particles = mt_rand(1, 100); // Roll D100
	
  if($number_of_virus_particles <= ($percentage_of_virus_in_particles * 100)){
    // Distribute virus particles into droplets
    $number_of_virus_particles = round(($droplet_size / $virus_size_microns) * $percentage_of_virus_in_particles);
  }
  else{
    $number_of_virus_particles = 0;
  }
  
  // Store virus particles in droplet
  $droplets[$droplet_size][] = array('x'=>$x, 'y'=>$y, 'virus'=>$number_of_virus_particles);
  $total_number_of_virus_particles += $number_of_virus_particles;
  
}
echo " done!" . PHP_EOL;


///////////////////////////////////
// Draw Image                    //
///////////////////////////////////

echo "Drawing image... ";
$img = imagecreatetruecolor($simulation_size, $simulation_size);
$fabric_color = imagecolorallocate($img, 0, 0, 255);// Sheets of egyptian cotton
$virus_color = imagecolorallocate($img, 255, 0, 0); // Dangerous
$mucus_color = imagecolorallocate($img, 0, 255, 0); // Not dangerous just yucky!

// Add the fabric to the simulation image
foreach($fabric as $x=>$data){
  foreach($data as $y=>$data){
    @imagesetpixel($img , $x, $y, $fabric_color);
  }
}

// Add the sneeze to the simulation image
foreach($droplets as $size=>$droplets){
  foreach($droplets as $droplet){
     
	$color = $mucus_color;
	   
    // Droplet Contanins Virus Particles + mucus
    if($droplet['virus'] > 0){
      $color = $virus_color;
    }

	imagefilledellipse($img , $droplet['x'], $droplet['y'], $size, $size, $color);
  }
}
echo " done!" . PHP_EOL;


///////////////////////////////////
// Save Image                    //
///////////////////////////////////

echo "Saving image...";
imagepng($img, 'result.png');
imagedestroy($img);
echo " done!" . PHP_EOL;


///////////////////////////////////
// Build Report                  //
///////////////////////////////////

echo "Generating Report...";

$report = "Simulation Characteristics:\n";
$report .= "Simulation Square Size (Inches): $simulation_square_size_inches\n";
$report .= "Simulation Height & Width (Pixels/Microns): $simulation_size\n";
$report .= "Simulation Area (Pixels/Microns): " . ($simulation_size * $simulation_size) . "\n" ;
$report .= "\n";

$report .= "Fabric Characteristics:\n";
$report .= "Fabric Simulation Method:";

if($fabric_simulation_method == USE_MESH_SIEVE_MICRON){
  $report .= "Mesh Sieve\n";
  $report .= "Mesh Size: $fabric_mesh_size_microns_or_thread_count\n";
}
elseif($fabric_simulation_method == USE_THREAD_COUNT){
  $report .= "Thread Count\n";
  $report .= "Thread Count: $fabric_mesh_size_microns_or_thread_count\n";
}
$report .= "Thread thickness method:";
if($thread_thickness_method == USE_THREAD_SIZE_MICRON){
  $report .= "Micron\n";
  $report .= "Thread Size (Micron): $thread_size_micron_denier_tex\n";
}
elseif($thread_thickness_method == USE_THREAD_SIZE_DENIER){
  $report .= "Denier\n";
  $report .= "Thread Size (Denier): $thread_size_micron_denier_tex\n";
  $report .= "Fiber Density (g/mL): $fiber_density_grams_per_millileter\n";  
}
elseif($thread_thickness_method == USE_THREAD_SIZE_TEX){
  $report .= "Tex\n";
  $report .= "Thread Size (Tex): $thread_size_micron_denier_tex\n";
  $report .= "Fiber Density (g/mL): $fiber_density_grams_per_millileter\n";
}
$report .= "\n";
$report .= "Sneeze Characteristics:\n";
$report .= "Lung Volume (Liters): $lung_volume_Liters\n";
$report .= "Minimum Droplets (Per Liter): $minimum_droplets_per_liter\n";
$report .= "Maximum Droplets (Per Liter): $maximum_droplets_per_liter\n";
$report .= "Sneeze Spread (Standard Deviation): $sneeze_spread\n";
$report .= "Respirable Aerosol Droplet Minimum Size (Microns): $respirable_aerosol_droplet_minimum_size_microns\n";
$report .= "Respirable Aerosol Droplet Maximum Size (Microns): $respirable_aerosol_droplet_maximum_size_microns\n";
$report .= "Maximum Droplet Size (Microns): $maximum_droplet_size_microns\n";
$report .= "Percentage of Respirable Droplets: " . ($percentage_of_respirable_droplets * 100) . "%\n";
$report .= "Percentage of Virus in Particles:  " . ($percentage_of_virus_in_particles * 100) . "%\n";
$report .= "\n";
$report .= "Virus Characteristics:\n";
$report .= "Virus Size (Microns): $virus_size_microns\n";
$report .= "Total Number of Virus Particles: $total_number_of_virus_particles\n";
$report .= "Number of Virus Particles Contained: Unimplemented\n";
$report .= "Number of Virus Particles Leaked: Unimplemented\n";

file_put_contents("Report.txt", $report);
echo " done!" . PHP_EOL;


?>
