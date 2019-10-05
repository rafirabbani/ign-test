<?php
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

 $get_data = callAPI('GET', 'https://api-test.internationalglobalnetwork.com/api/', false);
 $response = json_decode($get_data, true);
 $errors = $response['response']['errors'];
 $data = $response['response']['data'][0];





?>