<?php

class rdaspa{
    
    private $foundList = [];
    private $initialList =[];
	private $iListCopy = [];
    
    
    // this will take in the list from processor
    function __construct($iList)
	{
			
		$checkdate;
		
        $this->initialList = $iList;
        
        $iList_initial  = $ilist;
        $iList_copy     = $ilist;
        
        foreach($this->initialList as $initialNode)
        {
			$checkdate = strtotime('1 month ago', strtotime($initialNode->getDate()));

            foreach($this->iListCopy as $copyNode)
            {
				
                if(strcmp($initial_node.description,$copy_node.description))
                {
					
					if($copyNode->getDate() == $checkdate)
					{
						//initial node in
						array_push($foundList, $initialNode);

					}
					
                }
            }
        }
       
    }
	
	function printFound()
	{
		return $this->foundList;
	}
    
}








?>