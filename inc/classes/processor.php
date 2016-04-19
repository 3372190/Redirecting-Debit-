<?php	
include ('serviceprovider.php');


class Processor{

    
    
    private $serviceList = array();
    
    function __construct($filename, $bankNumber){
        
        if($handle = fopen($filename, 'r')){
            
            while($data = fgetcsv($handle)){
               
                //1 is westpac
                if($bankNumber == 1) // 1 is westpac
                {
                    
                    if ($i == 0)
                        {
                            $i++;
                        }
                        else
                        {
                            //Get data from columns 1 and 2
                            
                            $this->serviceList[] = new ServiceProvider($data[2], $data[1]);
                            $i++;
                        }


                }else if($bankNumber  == 2){ // is commbank



                }
                
                
            }
            

            
        }
        
    }
    
    
    public function printList(){
        foreach($this->serviceList as $service){
             //echo json_encode($service->getTitle());
            echo $service->getTitle()."\n";
        }
        
        
    }
    
    
}



?>