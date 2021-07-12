<?php

require 'dbConnect.php';

function insertUser($firstName, $lastName, $gender, $dob, $religion, $presentAddress, $permanentAddress, $phoneNumber, $email, $personalWebsite, $username, $password)
{
    $connection = connect();

    $query = "INSERT INTO USERS (firstName, lastName, gender, dob, religion, presentAddress, permanentAddress, phoneNumber, email, personalWebsiteUrl, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);
    $sql->bind_param("ssssssssssss", $firstName, $lastName, $gender, $dob, $religion, $presentAddress, $permanentAddress, $phoneNumber, $email, $personalWebsite, $username, $password);
    // $result = sql->execute();
    return $sql->execute();
}
