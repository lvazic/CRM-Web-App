<?php
include "/broker.php";
//Get records from database
 

$kupid = $_GET['kupid'];

$b = new Broker();

$b->open();

$result = $b->returnSalesItems($kupid);
//Add all records to an array
$rows = array();
while($row = $result->fetch_object())
{
    $rows[] = $row;
}
 
//Return result to jTable
$jTableResult = array();
$jTableResult['Result'] = "OK";
$jTableResult['Records'] = $rows;
echo json_encode($jTableResult);

?>