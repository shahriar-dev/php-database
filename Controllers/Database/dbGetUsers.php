<?php
require 'dbConnect.php';

function getUser($username, $password)
{
    $connection = connect();

    $query = "SELECT * FROM USERS WHERE username = ? AND password = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param("ss", $username, $password);
    $sql->execute();
    $res = $sql->get_result();
    return $res->num_rows === 1;
}
