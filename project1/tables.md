|----------------|                       
|     Brands     |                          
|----------------|                  
| - brand_id     |                        
| - brand_name   |                      
|                |                        
|                |                           
|----------------|       

|---------------|
|     Parts     |
|---------------|
| - part_id     |
| - part_name   |
| - brand_id    |
| - price       |
|---------------|

|--------------------|
|  Compatibility     |
|--------------------|
| - compatibility_id |
| - compatible_with  |
| - part_id          |
|--------------------|

|----------------|      
|   Computers    |      
|----------------|      
| - computer_id  |      
| - computer_name|      
|                |      
|----------------|      

|--------------------|
| ComputerParts      |
|--------------------|
| - computer_part_id |
| - computer_id      |
| - part_id          |
|--------------------|

