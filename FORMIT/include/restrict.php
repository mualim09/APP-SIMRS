<?php
session_start();
 
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    //redirect ke halaman login
    header('location: ./login.php?ntf=0');
} 

$user = $_SESSION['username'];

?>