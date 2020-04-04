<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
function slug($z){
    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = ucfirst($z);
    return trim($z, '-');
}

include 'auth.php';
session_start();

$json = file_get_contents('php://input');
$obj = json_decode($json, true); //true means it will be an assoc array
$table = strtoupper($obj['table']); //This should yield which table in database to use
//$guid = $_SESSION['GUID'];

$connection = mysqli_connect($DB_ADDRESS, $DB_USER, $DB_PASS, $DB_SCHEMA);
mysqli_set_charset($connection, "utf8");
//TARGET_AUDIENCE, MEET_DAY, MEET_TIME_START, DURATION, LEADER, PHONE_NUMBER, EMAIL, LOCATION, CAMPUS, GROUP_LINK, GROUP_TYPE,TRIM(DESCRIPTION) as DESCRIPTION 
$query = "SELECT SYS_ID, TITLE, TARGET_AUDIENCE, MEET_DAY, MEET_TIME_START, DURATION, LEADER, PHONE_NUMBER, EMAIL, LOCATION, CAMPUS, GROUP_LINK, GROUP_TYPE, CARE_PROVIDED, COST, ACTIVE, TRIM(DESCRIPTION) as DESCRIPTION FROM SMALL_GROUPS LIMIT 999";
$result = mysqli_query($connection, $query) or die('{"records": [{"error": "' . mysqli_error($connection) . '"}]}');
$info = array();

while($rs = mysqli_fetch_assoc($result)) {
	//array_push($info, $rs);
	array_push($info, $rs);
} 

echo json_encode($info);
?>