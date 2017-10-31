<?php


$servername = "localhost";
$username = "u602034318_user";
$password = "abcd1234";
$dbname = "u602034318_user";
// $dbname = "sf2017_main";
try
{
    $conn = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
}
catch(PDOException $e)
{
    echo $e->getMessage();
    die(); /* TO Terminate the Code */
}

require_once "QnA.php";


//Initialize QnA class
$quesNans = new QnA($conn);

?>