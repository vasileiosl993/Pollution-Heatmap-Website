<?php
$connect=mysqli_connect('localhost', 'root', '');
if (!$connect){
	die('Could not connect to database: ' . mysqli_error());
}

mysqli_set_charset($connect,"utf8");

$db_select = mysqli_select_db($connect, 'projectwebdb');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
?>