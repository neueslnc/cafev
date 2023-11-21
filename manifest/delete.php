<?php 
header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"])) 
{
	header("location:login.php");
}
require ('development_mode_control.php') ;

$f=$_GET ['f'] ;
$u = $_GET ['u'] ;
$d = $_GET ['d'] ;
$r = $_GET ['r'] ;

// $sql = "DELETE FROM {$d} WHERE {$r} = ?";
// $stmt= $conn->prepare($sql);
// $stmt->execute([$f]);
// header('Location: '.$u); 
if ($sql = $DB->query("DELETE FROM {$d} WHERE {$r} = ?", array("$f"))); {
    header('Location: '.$u); 
}


?>