<?php

include "/broker.php";

$kid = $_GET['kid'];

$b = new Broker();
$b->open();

$result = $b->returnNumberOfAssignedLeads($kid);
$assignedLeads = $result->fetch_object();

$result = $b->returnNumberOfAssignedAccounts($kid);
$assignedAccounts = $result->fetch_object();

$result = $b->returnNumberOfSales($kid);
$numberOfSales = $result->fetch_object();

$result = $b->returnTotalSalesValue($kid);
$totalSalesValue = $result->fetch_object();

$rows = array();
$rows[] = $assignedLeads;
$rows[] = $assignedAccounts;
$rows[] = $numberOfSales;
$rows[] = $totalSalesValue;


 
//Return result to jTable
echo json_encode($rows);
$b->close();

?>