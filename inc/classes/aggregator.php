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