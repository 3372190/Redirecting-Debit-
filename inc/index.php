<?php

include ('classes/processor.php');



$processor = new Processor('sampleStatement.csv', 1);

$processor->printList();







?>