<?php
//Cleanse data (here or calling form)

//Save to database

//Welcome

//Please upload your statement in CSV form:

//CSV parser:

//Start at row 2 for Westpac (row 1 has titles)
$row = 2;
$i = 0;
$j = 0;
//var_dump($row)
$providers = array();

if (($handle = fopen("assets/CSVs/sampleWestpacStatement.csv", "r")) !== FALSE) 
{
	$date = array();
	$desc = array();
	
	//While not EOF - Keep importing next row
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	{
		
		//Holds number of fields per row
        $num = count($data);
		
		//Need these as arrays -> then compare every element? Mabbeh bit slow.
		array_push($date, $data[2]) $date[$row-1] = $data[2];
		$desc[$row-1]  = $data[3];
		
		$row++;	
    }
    fclose($handle);

	for ($i = 0; i < row; i++)
	{
		if ($date(i) == $date(i+1) 
			&& $desc(i) == $desc(i+1))
		{
			//Match! -> Service prodiver detected
			$providers[$j] = $desc[i];
			$j++;
		}
	
	}
	
	echo $providers[0];
	
		/*Traverse cells (colums) of row $num of CSV
        for ($c=0; $c < $num; $c++) {
            
			echo $data[$c] . "<br />\n";
        }
		*/

//


/*
if( isset($_POST['submit'])
{*/
	//echo $_POST['uname'];
	// Your PHP code here

?>