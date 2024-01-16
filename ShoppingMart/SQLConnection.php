<?php

//initializing values for connection stirng
$host = "localhost";
$con_username = "root";
$con_password = "";
$db_name = "ShoppingMart";

//connection string
$con = new mysqli($host,$con_username,$con_password,$db_name) or die("Connection failed: " . 
$con->connect_errno);

?>