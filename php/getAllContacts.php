<?php
include "/broker.php";
//Get records from database
 
$b = new Broker();

$b->open();

$result = $b->returnAllContacts();
//Add all records to an array
$rows = array();
while($row = $result->fetch_object())
{
    $rows[] = $row;
}

$result = $b->returnNumberOfContacts();
 
//Return result to jTable
$jTableResult = array();
$jTableResult['Result'] = "OK";
$jTableResult['Records'] = $rows;
$jTableResult['TotalRecordCount'] = $result->fetch_object()->count;
echo json_encode($jTableResult);
$b->close();

?>