<?php	
include ('serviceprovider.php');


class Processor{

    
    private $serviceList = array();
    
    function __construct($filename, $bankNumber)
	{
		$i = 0;
        
        if($handle = fopen($filename, 'r')){
            
            while($data = fgetcsv($handle)){
               
                //1 is westpac
                if($bankNumber == 1) //Westpac
                {
                    /*
                    if ($i == 0)
                        {
                            $i++;
                        }
                        else
                        {
                            //Get data from columns 1 and 2
					$i++;
                    */        
					
					$this->serviceList[] = new ServiceProvider($data[2], $data[0], $data[1]); //Data[3] debit column
                }
				
				else if($bankNumber  == 2 || $bankNumber  == 4)  //Commbank & ANZ
				{
					$this->serviceList[] = new ServiceProvider($data[2], $data[0], $data[1]); 
					/* 0 - Date
					   1 - Amount
					   2 - Description
					*/
				}
				else if($bankNumber == 3) //NAB
				{
					
				}
				else return FALSE;
                
            }
            

            
        }
        
    }
    
    
    public function printList(){
        foreach($this->serviceList as $service){
             //echo json_encode($service->getTitle());
            echo $service->getTitle()."\n";
        }  
    }
    
    public function getServiceList(){
        return $this->serviceList;
    }
    
    
}



?>