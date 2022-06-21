<?php

require('connection.php');

#for login
if(isset($_POST['login']))
{
	$query="SELECT * FROM `registered_user` WHERE email = '$_POST[email_username]' OR username = '$_POST[email_username]';";


	$result=mysqli_query($con,$query);

	if($result)
	{
		if(mysqli_num_rows($result)==1)
		{
			$result_fetch=mysqli_fetch_assoc($result);
if(password_verify($_POST['password'], $result_fetch['password']))
{
	#password matching, if matched
	echo "password right";
}
else{
	#if doesn't match
	echo"
		<script>
		alert('incorrect password');
		window.location.href='log.php';
		</script>
		";

	}
}
else{
	echo"
	<script>
	alert('email or username not registered');
	window.location.href='log.php';
	</script>
	";
}
}
else{
	echo"
	<script>
	alert('cannot run Query at this time');
	window.location.href='log.php';
	</script>
	";
}
}




#for reg
if(isset($_POST['register']))
{	

	$user_exist_query="SELECT * FROM `registered_user` WHERE username = '$_POST[username]' OR email = '$_POST[email]';";

	$result=mysqli_query($con,$user_exist_query);

	if($result)
	{
		if(mysqli_num_rows($result)>0) 
		{	
			$result_fetch=mysqli_fetch_assoc($result);
			if($result_fetch['username']==$_POST['username'])
			{

				echo"
				<script>
				alert('$result_fetch[usernamer] - Username already taken');
				window.location.href='log.php';
				</script>
				";
			}
			else
			{

				echo"
				<script>
				alert('$result_fetch[email] - E-mail already registered');
				window.location.href='log.php';
				</script>
				";
			}
		}
		else 
		{
			$password=password_hash($_POST['password'],PASSWORD_BCRYPT);
			echo $query="INSERT INTO registered_user (full_name, username, email, password) VALUES 
			('$_POST[fullname]','$_POST[username]', '$_POST[email]', '$password')";

			#if($con->query($query) === TRUE)
			if(mysqli_query($con,$query))
			{

				echo"
				<script>
				alert('Registration Succesful');
				window.location.href='log.php';
				</script>
				";
			}
			else
			{
echo"
				<script>
				alert('Query Not working');
				window.location.href='log.php';
				</script>
				";
				
		
			}
		}
	}
	
	else
	{
		echo"
		<script>
		alert('this one cannot run Query');
		window.location.href='log.php';
		</script>
		";
	}
}

?>