<?php
<<<<<<< HEAD


=======
<<<<<<< HEAD

=======
        //SEE ME ON MASTER
	
>>>>>>> master
	$date = [];
	$description = [];
	$count = 0;
	$i = 0;
	$founddesc = [];
	$founddate = [];
	$j = 1;
	$n = 0;
<<<<<<< HEAD
	$tempdate1;
	$tempdate2;
	$checkdate1;
	$checkdate2;
	
	if (($handle = fopen("sampleStatement2.csv", 'r')) !== FALSE)
=======
>>>>>>> 04e286a627c4fecc9b207aa1c1d8e8efaafdeb2f

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
>>>>>>> master
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
<<<<<<< HEAD

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
=======
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
>>>>>>> master
		}	
	}	
}


var_dump($founddesc);

$i = 0;
$j = 0;

for ($i = 0; $i < $n; $i++)			//n = 10 for sample
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
<<<<<<< HEAD

	var_dump($founddesc);
	$i = 0;
	$j = 0;
	
	
	for ($i = 0; $i < $n; $i++)					//Cleansing potential service providers
	{
		while (empty($founddesc[$i]))
		{
			if ($i == $n)
=======
	
	for ($j = $i + 1; $j < $n; $j++)
	{

		while (empty($founddesc[$j]) && $j < $n)
		{
<<<<<<< HEAD
			if ($j == $n)
=======
<<<<<<< HEAD
			echo $founddesc[i];
			echo $founddesc[i];
=======
>>>>>>> 0909fffc8abf48b6af112e6b4a55486fa65c154b
			if (empty($founddesc[$j]))
>>>>>>> 04e286a627c4fecc9b207aa1c1d8e8efaafdeb2f
>>>>>>> master
			{
				echo "no more duplicates";
				var_dump($founddesc);
				break;
			}
<<<<<<< HEAD
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
=======
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
>>>>>>> master

?>