<?php
$con=mysqli_connect("localhost", "root", "", "testing");


if(mysqli_connect_error()){
	echo"<script>alert('cannot to the database');</script>";
	exit();
}
?>