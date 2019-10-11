<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "sql-connection.php";
function callAPI($method, $url, $data){
    $curl = curl_init();
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: none'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;

    
}

$json_data = callAPI('GET', 'https://api-test.internationalglobalnetwork.com/api/awmun', false);
$response = json_decode($json_data,true);


function checkData($email) {
    global $conn;
    $sql = "SELECT * from applicant where email ='$email'";
    $result = $conn->query($sql);
   if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

foreach($response as $row) {
    $check = checkData($row['email']);
    if ($check) {
        echo ("Data sudah ada <br>");
    } else {
        $sql = "INSERT INTO `applicant` (`name`, `email`, `birth_date`, `country_origin`, `phone`, `regist_date`, `pickup_status`, `motiv_letter`) 
        VALUES ('".$row["nama"]."', '".$row["email"]."', '".$row["birth_date"]."', '".$row["country"]."','".$row["phone"]."', '".$row["registration_date"]."', '".$row["need_pickup"]."', '".$row["motivation_letter"]."')";
        $conn->query($sql);
        echo ("Data dimasukkan <br>");
    }
}

$conn->close();
?>


 
 





