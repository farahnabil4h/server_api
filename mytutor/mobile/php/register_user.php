<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}

include_once("dbconnect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$status = "available";
$sqlinsert = "INSERT INTO tbl_users(user_email, user_name, user_pass, user_phoneno, user_address) VALUES ($email, $name, $password, $phoneno, $address)";


if ($conn->query($sqlinsert)===TRUE) {
    $response = array('status' => 'success', 'data' => null);
    sendJsonResponse($response);
} else {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}

function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}

?>