<?php

include 'DataManager.php';

//Choose the file that needs to be added to main output file.
$inputFile = file('input_test2.csv');


//Use DataManager class to import data from input file, sort it and write in output file.
DataManager::importAndReadData($inputFile);