<?php

class rdaspa{
    
    private $foundList = array();
    private $initialList = array();
	private $iListCopy = array();
	private $providerList = array();
    
    
    // this will take in the list from processor
    function __construct($iList)
	{
<<<<<<< HEAD
			
		$checkdate1;
		$checkdate2;
		$i = 0;
		$j;
=======
		if( ! ini_get('date.timezone') )
        {
            date_default_timezone_set('GMT');
        }	
		$checkdate;
		
>>>>>>> 6f6f6ef77e6eb2a72af1b044e3d1387aa0defb2f
        $this->initialList = $iList;
        $this->iListCopy = $iList;
        
		
		for ($i = 0; $i < count($iList); $i++)		
		{
			$checkdate1 = strtotime('1 month ago', strtotime($iList[$i]->getDate()));	//Reference date
			
			for ($j = $i + 1; $j < count($iList); $j++)
			{
				$checkdate2 = strtotime($iList[$j]->getDate());			//Date to check against reference
				
				if (strcmp($iList[$i]->getTitle(), $iList[$j]->getTitle()) == 0)	//If matching desciptions
				{
					if ($checkdate1 == $checkdate2)			//and 1 month apart
					{
						array_push($this->foundList, $iList[$i]);		//add to foundList
					}
					
				}
			}
		}

       
    }
	
	function printFound()
	{
		return $this->foundList;
	}
	
	
	function compareProvider()
	{
		/*Tokenise descriptions in foundlist.
			- Run each token against each index of provider name array
			- On match: set the matched objects name to be the provider
			- add the object it to list.	
		*/
			//Starting westpac, commbank currently just has identifier.
	$i;
	
	for ($i = 0; $i < count(foundList); $i++)
	{
		$token = strtok($foundList[$i]->getTitle(), " "); 		//Tokenize description
		
		while($token != FALSE)
		{
			if (strcmp($token, NAME) == 0)				//If token == name of provider in database
			{
				foundList[$i]->setName($TOKEN);			//Set object name = matched token
				array_push($spList, foundList[$i]);		//Add object to found list/
			}
			
			$token = strtok(" ");						//Next token
		}
	}
		
	}
	function getspList()
	{
		return $this->spList;
	}
	
	function setProviders($providerList){
		$this->providerList = $providerList;
	}
	
	
 
}








?>