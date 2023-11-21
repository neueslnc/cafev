<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;

$u = "all_products.php";
$id = $_GET ['id'] ;

// $sql = "DELETE FROM {$d} WHERE {$r} = ?";
// $stmt= $conn->prepare($sql);
// $stmt->execute([$f]);
// header('Location: '.$u);
if ($sql = $DB->query("DELETE FROM productnames WHERE id = ?", array("$id"))); {
    header('Location: '.$u);
}
?>