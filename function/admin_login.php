<?php

	include('../db/dbconn.php');

if (isset($_POST['enter']))

	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		
			$result=mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password' ");
			if (mysqli_num_rows($result) == 0) {
				echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác');</script>";
			}
			$row=mysqli_fetch_array($result);
			$run_num_rows = mysqli_num_rows($result);
							
						if ($run_num_rows > 0 )
						{
							session_start ();
							$_SESSION['id'] = $row['adminid'];
							header ("location:admin_home.php");
						}		
		}
?>