<?php

$servername = 'localhost';
$username = 'root';
$password = 'Popispop3050@';
$dbname = 'pixels';


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{

}

