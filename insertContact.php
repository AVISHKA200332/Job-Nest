<?php

require 'config.php';

$name = $_POST["name"];
$mail = $_POST["email"];
$phon = $_POST["phone"];
$comp = $_POST["company"];
$mass = $_POST["message"];

$spl = "INSERT INTO contacts VALUES ('', '$name', '$mail', '$phon', '$comp', '$mass')";

if($con->query($spl)){
    echo "Insert Successfull";
}

else{
    echo "Error".$con->error;
}

$con->close();
?>