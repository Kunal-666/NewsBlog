<?php
ob_start();

$db['db_host'] = "sql308.infinityfree.com";
$db['db_user'] = "if0_35271623";
$db['db_pass'] = "lQidfiz83V340q";
$db['db_name'] = "if0_35271623_cms";

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>
