<?php
include "/broker.php";
//Get records from database
 
$b = new Broker();
if (isset($_POST['fid']) && isset($_POST['kid_2'])){

$fid = trim($_POST['fid']);
$kid_2 = trim($_POST['kid_2']);

$b->open();

if ($b->assignLead($fid, $kid_2)){
$jTableResult = array();
$jTableResult['Result'] = "OK";
print json_encode($jTableResult);
} else {
$jTableResult = array();
$jTableResult['Result'] = "ERROR";
print json_encode($jTableResult);
}

$b->close();
}

?>