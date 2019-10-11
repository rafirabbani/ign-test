<?php

include "sql-connection.php";
 
function createTable ($tableName) {
    global $conn;
    $sql = "CREATE TABLE $tableName (
        id INT(5) UNSIGNED AUTO_INCREMENT PRIMARYKEY,
        name varchar(30),
        email varchar(30),
        birth_date date, 
        country varchar(20),
        phone varchar(20),
        regist_date date,
        pickup_status boolean,
        motive_letter text
    )";
    $result = $conn->query($sql);
    if ($result) {
        echo ("Table made successfully");
    } else {
        echo ("Error creating table");
    }
}

createTable(ign);










?>