<?php

include ('classes/processor.php');
include ('classes/rdaspa.php');



$processor = new Processor('sampleStatement.csv', 1);

$processor->printList();

$rdaspa = new rdaspa($processor->getServiceList());







?>