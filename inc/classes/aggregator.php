<?php


	$date = [];
	$description = [];
	$count = 0;
	$i = 0;
	$founddesc = [];
	$founddate = [];
	$j = 1;
	$n = 0;
	$tempdate1;
	$tempdate2;
	$checkdate1;
	$checkdate2;
	
	if (($handle = fopen("sampleStatement2.csv", 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle)) !== FALSE)
		{
			if ($i == 0)
			{
				$i++;
			}
			else
			{
				//Get data from columns 1 and 2
				$date[$i] = $data[1];
				$description[$i] = $data[2];
				$count++;
				$i++;
			}
		}
	}

	$desc1 = [];
	$date1 = [];
	$desc2 = [];
	$date2 = [];
	
				
				//Start parsing and finding providers, DEFINE CRITERIA
	for ($i = 1; $i <= $count; $i++)
	{
		$desc1[$i] = $description[$i]; 
		$date1[$i] = $date[$i];
		$date1[$i] = str_replace('/','-', $date1[$i]);
		$checkdate1 = strtotime('1 month ago', strtotime($date1[$i]));
		
		
		for ($j = $i + 1; $j <= $count; $j++)
		{
			$desc2[$j] = $description[$j];
			$date2[$j] = $date[$j];	
			$date2[$j] = str_replace('/','-', $date2[$j]);	//Changes from date format: MM-DD-YY to WESTPACS FORM DD-MM-YY.
			$checkdate2 = strtotime($date2[$j]);			
			
			
			if (strcmp($desc1[$i], $desc2[$j]) == 0) 		//If two entries share same description, check dates
			{
					if ($checkdate1 == $checkdate2)			//If two entries are 1 month apart, potential SP.
					{
						$founddesc[$n] = $desc1[$i];		//Put all potentials  into founddesc
						$n++;
					}
					/* Do the date check here?
						- Start with monthy. -> month - 1 (for westpac recent to latest)
						- If the debits by service of same name occurs 1 or  times over 4 months 
							- Likely provider
					*/
					
				
			}	
		}	
	}

	var_dump($founddesc);
	$i = 0;
	$j = 0;
	
	
	for ($i = 0; $i < $n; $i++)					//Cleansing potential service providers
	{
		while (empty($founddesc[$i]))
		{
			if ($i == $n)
			{
				echo "no more duplicates";
				var_dump($founddesc);
				break;
			}
			$i++;
		}
		
		for ($j = $i + 1; $j < $n; $j++)
		{

			while (empty($founddesc[$j]) && $j < $n)
			{
				if ($j == $n)
				{
					echo "no more duplicates";
					var_dump($founddesc);
					break;
				}
				$j++;
			}
			
			if ($j != $n)
			{;
				if (strcmp($founddesc[$i], $founddesc[$j]) == 0)
				{			
					unset($founddesc[$j]);
				}
			}
		}
	}

?>