<?php
function connect()
{
    try {
        $connection = new mysqli("localhost", "shahriar", "1234", "wtk");
        return $connection;
    } catch (Exception $e) {
        $Message = "Database connection failed .... ";
    }
}
