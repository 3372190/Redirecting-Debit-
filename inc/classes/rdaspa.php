<?php
class rdaspa{
    
    private $foundList = array();
	private $initialList = array();
	private $iListCopy = array();
	private $providerList = array();
    private $spList = array();


	// this will take in the list from processor
	function __construct($iList)
	{

		$checkdate1;
		$checkdate2;
		$i = 0;
		$j;
		$startDate;
		$endDate;
		$currDate;
		$newDate;
		$i = 0;
		$j;
		//$foundCount= [];
		if (!ini_get('date.timezone'))
        {
            date_default_timezone_set('GMT');
        }
		$checkdate;

		$this->initialList = $iList;
		$this->iListCopy = $iList;

		/* Service Provider Criteria
			- Recurring payments every month (+- 3 days)
			- MUST CHECK DIRECTION OF FUNDS.

		*/

		for ($i = 0; $i < count($iList); $i++)
		{
			$currDate = strtotime('1 month ago', strtotime($iList[$i]->getDate()));	//Reference date (1 month before original)
			$startDate = strtotime('-3 days', $currDate);							//3 days prior to 1 month reference
			$endDate = strtotime('+3 days', $currDate);								//3 days after 1 month reference

			if (strcmp($iList[$i]->getAmount(), " ") == 0)
			{

			} else {
				for ($j = $i + 1; $j < count($iList); $j++) {
					$newDate = strtotime($iList[$j]->getDate());                        //Date to check against reference
					if (strcmp($iList[$i]->getTitle(), $iList[$j]->getTitle()) == 0)    //If matching desciptions
					{
						if ($newDate > $startDate && $newDate < $endDate)                //1 month +- 3 days.
						{
							//var_dump($iList[$i]);
							array_push($this->foundList, $iList[$i]);

							/*if($iList[$i]->getAmount() == $iList[$j]->getAmount())		//This line is questionable....
							{

												//add to foundList
							}*/
						} else {
							break;
						}

						/*
						if ($currDate == $newDate)							//and 1 month apart
						{
							array_push($this->foundList, $iList[$i]);		//add to foundList
						}
						*/
					}
				}
			}
		}
    }

	function getFoundList()
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
	$j;

		for ($i = 0; $i < count($this->foundList); $i++)
	{
		$j = 0;
		while($j < count($this->providerList))
		{
			$token = strtok($this->foundList[$i]->getTitle(), " "); 		//Tokenize description
            while($token != NULL)
			{

				$token = strtoupper($token);
				$this->providerList[$j] = strtoupper($this->providerList[$j]);
				if (strcmp($token, $this->providerList[$j]) == 0)				//If token == name of provider in database
				{
					$this->foundList[$i]->setName($token);				//Set object name = matched token
					array_push($this->spList, $this->foundList[$i]);            //Add object to found list/
				}
				$token = strtok(" ");							//Next token
			}

			$j++;
		}
	}
		/*
        */


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