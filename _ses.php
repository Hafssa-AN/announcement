<?php
session_start();
if(empty($_SESSION["email"]))
header('Location: form_conn.php');
?>