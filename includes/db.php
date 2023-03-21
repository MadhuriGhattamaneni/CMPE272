<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cmpe_final');
// define('DB_USERNAME', 'id19993608_root');
// define('DB_PASSWORD', 'Password@123');
// define('DB_NAME', 'id19993608_cmpe_final'); 

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($con == false){
    dir('Error: Cannot connect');
}

?>