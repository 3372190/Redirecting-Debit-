<?php

class rdaspa{
    
    private $foundList = array();
    private $initialList = array();
	private $iListCopy = array();
    
    
    // this will take in the list from processor
    function __construct($iList)
	{
			
		$checkdate1;
		$checkdate2;
		$i = 0;
		$j;
        $this->initialList = $iList;
        $this->iListCopy = $iList;
        
		
		for ($i = 0; $i < count($iList); $i++)
		{
			$checkdate1 = strtotime('1 month ago', strtotime($iList[$i]->getDate()));
			
			for ($j = $i + 1; $j < count($iList); $j++)
			{
				$checkdate2 = strtotime($iList[$j]->getDate());
				
					if (strcmp($iList[$i]->getTitle(), $iList[$j]->getTitle()) == 0)
					{
						if ($checkdate1 == $checkdate2)
						{
							array_push($this->foundList, $iList[$i]);
						}
						
					}
			}
		}
		/*
		foreach($this->initialList[$i] as $initialNode)
        {
			$checkdate1 = strtotime('1 month ago', strtotime($initialNode->getDate()));
			$j = $i + 1;
            foreach($this->iListCopy[$j] as $copyNode)
            {
				initialList[$i]
				$checkdate2 = strtotime($copyNode->getDate());
                if(strcmp($initialNode->getTitle(),$copyNode->getTitle()))
                {
					
					if($checkdate1 == $checkdate2)
					{
						//initial node in
						array_push($this->foundList, $initialNode);

					}
					
                }
					
			}
			$i += 1;
        }*/
       
    }
	
	function printFound()
	{
		return $this->foundList;
	}
    
}








?>