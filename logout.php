<?php
session_start();
session_destroy();
sesseion_unset();
header("location:log.php"); 
?>