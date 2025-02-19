<?php

$con = new mysqli("localhost", "root", "", "job_nest_db");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
