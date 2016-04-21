<?php

	
	$date = [];
	$description = [];
	$count = 0;
	$i = 0;
	$founddesc = [];
	$founddate = [];
	$k = 1;
	$j = 1;
	$n = 0;

	if (($handle = fopen("sampleStatement.csv", 'r')) !== FALSE)
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
	
	for ($i = 1; $i <= $count; $i++)
	{
		$desc1[$i] = $description[$i]; //subway
		$date1[$i] = $date[$i];
		
		for ($k = $i + 1; $k <= $count; $k++)
		{
			$desc2[$k] = $description[$k];
			$date2[$k] = $date[$k];	
	
			if (strcmp($desc1[$i], $desc2[$k]) == 0) //Got a potential match
			{
				$founddesc[$n] = $desc1[$i];		//Put all matches into founddesc
				$n++;
			}	
		}	
	}
	var_dump($founddesc);
	
	$i = 0;
	$j = 0;
	
	for ($i = 0; $i < count($founddesc); $i++)
	{
		for ($j = $i+1; $j <= count($founddesc); $j++);
		{
			if (empty($founddesc[$j]))
			{
				$i = count($founddesc);				
				var_dump($i);
				var_dump($j);
				var_dump($founddesc);
				echo "break.";
				break;
			}
			if (strcmp($founddesc[$i], $founddesc[$j]) == 0)	//<---- Never enters this IF statement :s
			{			
				echo "Delete duplicate";
				unset($founddesc[$j]);
			}
		}
	}
		var_dump($founddesc);
	
				
				//OLD CODE

				/*for ($a = 0; $a < count($founddesc) + 1; $a++)			//Have we already detected it?
				{
					var_dump($desc2[$k]);
					var_dump($k);
					if (empty($founddesc[$n])) 			//First item being checked 
					{
						$founddesc[$n] = $desc1[$i];
						$founddate[$n] = $date1[$i];
						break;
					}
					else if (strcmp($desc1[$i], $founddesc[$a]) != 0) //No, add to found array.
					{
						//echo "Found_Description ";
						$founddesc[$n] = $desc1[$i];
						$founddate[$n] = $date1[$i];
						break;
					}
					else								//Yes, ignore
					{						
						//Already found, ignore.
						break;
					}
				}*/


?>