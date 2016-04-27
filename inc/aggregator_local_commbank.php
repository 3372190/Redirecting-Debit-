<?php


	$date = [];
	$description = [];
	$count = 0;
	$i = 0;
	$j = 1;
	$identifiers = [];
	
	$strtok;
	
	if (($handle = fopen("Commonwealth.csv", 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle)) !== FALSE)
		{
							//Get data from column 2 - description
			$description[$i] = $data[2];
			$count++;
			$i++;
		}
	}

				
						//Collects unique identifier of any digits directly after the string "Direct Debit"
	for ($i = 0; $i < $count; $i++)
	{
						//Combank: Finding "Direct Debit x"  first 3 tokens
		$strtok = strtok($description[$i], " ");
		if (strcmp($strtok, "Direct") == 0 )
		{
			$strtok = strtok(" ");		//Next token
			
			if (strcmp($strtok, "Debit") == 0)
			{
				$strtok = strtok(" ");	//6 digit identifier
				$identifiers[$i] = $strtok;	//saved to $identifiers
			}
		}
	}

	var_dump ($identifiers);
	for ($i = 0; $i < $count; $i++)					//Cleansing potential service providers
	{
		while (empty($identifiers[$i]))
		{
			if ($i == $count)
			{
				var_dump($identifiers);
				break;
			}
			$i++;
		}
		
		for ($j = $i + 1; $j < $count; $j++)
		{
			while (empty($identifiers[$j]) && $j < $count)
			{
				if ($j == $count)
				{
					var_dump($identifiers);
					break;
				}
				$j++;
			}
			
			if ($j != $count)
			{
				if (strcmp($identifiers[$i], $identifiers[$j]) == 0)
				{			
					unset($identifiers[$j]);
				}
			}
		}
	}
	
	
?>