<?php
include "/broker.php";
 

$kid = $_GET['kid'];

$b = new Broker();

$b->open();

$result = $b->returnAssignedAccounts($kid);
$rows = array();
while($row = $result->fetch_object())
{
    $rows[] = $row;
}


echo json_encode($rows);
$b->close();

?>