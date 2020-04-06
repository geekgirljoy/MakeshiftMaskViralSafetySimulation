# Makeshift Mask Viral Safety Simulation

## Colors:
* Blue = Fabric/Thread
* Green = Mucus without viral particles
* Red = Mucus **with** viral particles


## Sizes:
According to this wiki article: [Coronavirus]( https://en.wikipedia.org/wiki/Coronavirus): "The diameter of the virus particles is around 120 nm." (0.12 microns)

1 pixel = 1 micron (1/1000000 meters) which is the "base unit" of mesure used in this simulation - meaning that up to  (1 / ~0.12 = ~8.33 * ~8.33 * ~8.33 = ~578.009537)  viral particles can fit in each 1 pixel red dot.

The largest unit used is 1".

1 micron is about ~0.0000393701 inches (smaller than you can see).
![Size Reference Example2](https://raw.githubusercontent.com/geekgirljoy/MakeshiftMaskViralSafetySimulation/master/SizeReferenceExample2.png)

For reference, human hair is between 15 to 180 microns.
![Size Reference Example3](https://raw.githubusercontent.com/geekgirljoy/MakeshiftMaskViralSafetySimulation/master/SizeReferenceExample3.png)

![Size Reference Example](https://raw.githubusercontent.com/geekgirljoy/MakeshiftMaskViralSafetySimulation/master/SizeReferenceExample.png)
According to a google search, a penny is ~19,053 microns in diameter.

## Example Fabric Mask Simulations:

Dropplet size resolution between 1 to 10 pixel/microns.

* T-Shirt Example 60 thread count 30 denier
![T-Shirt Example](https://raw.githubusercontent.com/geekgirljoy/MakeshiftMaskViralSafetySimulation/master/t-shirt-result.png)

## Report: 

### Simulation Characteristics:

**Simulation Square Size (Inches):** 0.1

**Simulation Height & Width (Pixels/Microns):** 2540

**Simulation Area (Pixels/Microns):** 6451600


### Fabric Characteristics:

**Fabric Simulation Method:** Thread Count

**Thread Count:** 60

**Thread thickness method:** Denier

**Thread Size (Denier):** 30

**Fiber Density (g/mL):** 1.5

**Coverage Ratio (Thread to Mesh Sieve):** 1 : 16

**Note:** *A higher thread to lower mesh ratio is preferable because it means the fabric provides better filtration.*


### Sneeze Characteristics:

**Lung Volume (Liters):** 6

**Minimum Droplets (Per Liter):** 8500

**Maximum Droplets (Per Liter):** 15000

**Sneeze Spread (Standard Deviation):** 500

**Respirable Aerosol Droplet Minimum Size (Microns):** 0.5

**Respirable Aerosol Droplet Maximum Size (Microns):** 5

**Maximum Droplet Size (Microns):** 10

**Percentage of Respirable Droplets:** 33%

**Percentage of Virus in Particles:**  50%


### Virus Characteristics:

**Virus Size (Microns):** 0.12

**Total Number of Virus Particles:** 364910245

**Number of Virus Particles Contained:** Unimplemented

**Number of Virus Particles Leaked:** Unimplemented



* Dress Shirt Example 120 thread count 30 denier
![Dress-Shirt Example](https://raw.githubusercontent.com/geekgirljoy/MakeshiftMaskViralSafetySimulation/master/dress-shirt-result.png)

## Report

### Simulation Characteristics:

**Simulation Square Size (Inches):** 0.1

**Simulation Height & Width (Pixels/Microns):** 2540

**Simulation Area (Pixels/Microns):** 6451600


### Fabric Characteristics:

**Fabric Simulation Method:** Thread Count

**Thread Count:** 120

**Thread thickness method:** Denier

**Thread Size (Denier):** 30

**Fiber Density (g/mL):** 1.5

**Coverage Ratio (Thread to Mesh Sieve):** 1 : 4

**Note:** *A higher thread to lower mesh ratio is preferable because it means the fabric provides better filtration.*


### Sneeze Characteristics:

**Lung Volume (Liters):** 6

**Minimum Droplets (Per Liter):** 8500

**Maximum Droplets (Per Liter):** 15000

**Sneeze Spread (Standard Deviation):** 500

**Respirable Aerosol Droplet Minimum Size (Microns):** 0.5

**Respirable Aerosol Droplet Maximum Size (Microns):** 5

**Maximum Droplet Size (Microns):** 10

**Percentage of Respirable Droplets:** 33%

**Percentage of Virus in Particles:** 50%


### Virus Characteristics:

**Virus Size (Microns):** 0.12

**Total Number of Virus Particles:** 363860734

**Number of Virus Particles Contained:** Unimplemented

**Number of Virus Particles Leaked:** Unimplemented
