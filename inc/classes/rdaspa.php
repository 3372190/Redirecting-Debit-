<?php
class rdaspa{
    
    private $foundList = array();
	
	//ProviderList contains all known Service Providers in RedirectDebit database.
	private $providerList = array();
	
	//The final array of service providers as found by this function.
    private $spList = array();
	
	//The uploaded CSV.
	private $iList = array();


	// this will take in the list from processor
	function __construct($iList, $providers)
	{
		//@param $providers: Holds list of Service Provider names signed up with RedirectDebit.
		$this->providerList = $providers;
		$this->iList = $iList;
		$i;
		$startDate;
		$endDate;
		$currDate;
		$newDate;
		$j;

		if (!ini_get('date.timezone'))
        {
            date_default_timezone_set('GMT');
        }

		for ($i = 0; $i < count($this->iList); $i++)		
		{
			$currDate = strtotime('1 month ago', strtotime($iList[$i]->getDate()));	//Reference date (1 month before original)
			$startDate = strtotime('-3 days', $currDate);							//3 days prior to 1 month reference
			$endDate = strtotime('+3 days', $currDate);								//3 days after 1 month reference

			//Save some cycles.
			if (strcmp($iList[$i]->getAmount(), " ") == 0)
			{
			} else {	//Starting with the entry beneath the current one. Check the dates.
				for ($j = $i + 1; $j < count($this->iList); $j++) {
					
					//Date to check against reference
					$newDate = strtotime($this->iList[$j]->getDate());                        
					
					//Check if new date is 1 month +- 3 days prior to current date.
					if ($newDate > $startDate && $newDate < $endDate)                    
					{
						
						//Check if the potential SP entry has a keyword in RedirectDebit SP Database.
						if ($this->checkTokens($j))
						{
							//Add it to the SP List.
							array_push($this->spList, $this->iList[$j]);
						}
					}
				}
			}
		}
    }


	function checkTokens($k)                //Here only if entry $k passes date test.
	{
		$n;
		//Check every word in description string against database of provider names.
		
		for ($n = 0; $n < count($this->providerList); $n++) {
			//Tokenize
			$token = strtok($this->iList[$k]->getTitle(), " ");
			//Lowercase
			$token = strtolower($token);
			//Compare to names in providerList
			$this->providerList[$n] = strtolower($this->providerList[$n]);
			
			while ($token != NULL) 
			{
				if (strcmp($token, $this->providerList[$n]) == 0)                //If token in description matches SP database
				{
					if ($this->checkExistence($token))                    //Check if we already found that provider.
					{
						$this->iList[$k]->setName($token);
						return true;
					}
				}
				$token = strtok(" ");
				$token = strtolower($token);

			}
		}

		return false;
	}

	function checkExistence($token)            //Check to see if $token already assigned to name in spList
	{		
		$g;
		if (count($this->spList) == 0) {
			return true;
		} else {
			
			for ($g = 0; $g < count($this->spList); $g++) {
				if (strcmp($token, $this->spList[$g]->getName()) == 0) {
					
					return false;
					
				}
			}
		}

		return true; 

	}
	
	function getFoundList()
	{
		return $this->foundList;
	}
	
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