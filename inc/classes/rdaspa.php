<?php
class rdaspa{
    
    private $foundList = array();
	private $providerList = array();
    private $spList = array();
	private $iList = array();
    
    
    // this will take in the list from processor
    function __construct($iList, $providers)
	{
		//@param $providers: Holds list of Service Provider names signed up with RedirectDebit.
		$this->providerList = $providers;
		$this->iList = $iList;
		$i = 0;
		$startDate;
		$endDate;
		$currDate;
		$newDate;
		$j;

		if(!ini_get('date.timezone') )
        {
            date_default_timezone_set('GMT');
        }
        
		/* Service Provider Criteria
			- Recurring payments every month (+- 3 days)
			- 
		*/
		
		for ($i = 0; $i < count($iList); $i++)		
		{
			$currDate = strtotime('1 month ago', strtotime($iList[$i]->getDate()));	//Reference date (1 month before original)
			$startDate = strtotime('-3 days', $currDate);							//3 days prior to 1 month reference
			$endDate = strtotime('+3 days', $currDate);								//3 days after 1 month reference
			
			if (strcmp($iList[$i]->getAmount(), " ") == 0)
			{
				
			}
			else
			{
				for ($j = $i + 1; $j < count($iList); $j++)
				{
					
					$newDate = strtotime($iList[$j]->getDate());						//Date to check against reference
					//var_dump($newDate);
					
					if($newDate > $startDate && $newDate < $endDate)					//1 month +- 3 days
					{
						if ($this->checkTokens($j))			//If dates are a go, check if token in description exists in SP database.
						{
							array_push($this->spList, $iList[$j]);	
						}
					}
				}
			}
		}
    }
	
	
	function checkTokens($k)				//Here only if entry $k passes date test.
	{	
		$n;
		
		for ($n = 0; $n < count($this->providerList); $n++)
		{	
			$token = strtok($this->iList[$k]->getTitle(), " ");	
			$token = strtolower($token);
			$this->providerList[$n] = strtolower($this->providerList[$n]);
			
			while ($token != NULL)
			{
				
				if(strcmp($token, $this->providerList[$n]) == 0)				//If token in description matches SP database
				{
					//$this->iList[$k]->setName($token);
					if ($this->checkExistence($token))					//Check if we already found that provider.
					{
						$this->iList[$k]->setName($token);
						return true;
					}
				}
				$token = strtok(" ");
			}
		}
		
		return false;		
	}
	
	function checkExistence($token)			//Check to see if $token already assigned to name in spList
	{
		$i;
		if (count($this->spList) == 0)
		{
			return true;
		}
		else
		{
			for ($i = 0; $i<count($this->spList); $i++)
			{
				if (strcmp($token, $this->spList[$i]->getName() == 0))
				{
					//echo("here");
					return false;
					//array_push($this->spList, $this->foundList[$i]);			//Add object to found list/
				}
			}
		}	
		
		return true;
		
		
	}
	
	
	function getFoundList()
	{
		return $this->foundList;
	}
	
	
		/*Tokenise descriptions in foundlist.
			- Run each token against each index of provider name array
			- On match: set the matched objects name to be the provider
			- add the object it to list.	
		*/
	
	//Starting westpac, commbank currently just has identifier.
/*	function compareProvider()
	{
	
	$i;
	$j;
	
	for ($i = 0; $i < count($this->foundList); $i++)
	{
		$j = 0;		
		while($j < count($this->providerList))
		{
			$token = strtok($this->foundList[$i]->getTitle(), " "); 		//Tokenize description
            while($token != NULL)
			{
                $token  = strtolower($token);
                $this->providerList[$j] = strtolower($this->providerList[$j]);
				//var_dump($this->providerList[$j]);
				if (strcmp($token, $this->providerList[$j]) == 0)				//If token == name of provider in database
				{
					$this->foundList[$i]->setName($token);				//Set object name = matched token
					checkExistence($token);
					
				}
				$token = strtok(" ");							//Next token
			}
			
			$j++;
		}
	}		
	}*/
	
	function getspList()
	{
		return $this->spList;
	}
	
	function setProviders($providerList){
        //var_dump($providerList);
		$this->providerList = $providerList;
	}
	
	
 
}

?>