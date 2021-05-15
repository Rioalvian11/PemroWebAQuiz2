<?php
	if(isset($_POST['login'])){
 
		session_start();
		include('koneksi.php');
 
		$username=$_POST['username'];
		$password=$_POST['password'];
 
		$query=mysqli_query($koneksi,"select * from `user` where username='$username' && password='$password'");
 
		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="User tidak ada, silahkan input dengan benar!";
			header('location:index.php');
		}
		else{
			$row=mysqli_fetch_array($query);
 
			if (isset($_POST['remember'])){
				setcookie("user", $row['username'], time() + (86400 * 30)); 
				setcookie("pass", $row['password'], time() + (86400 * 30)); 
			}
 
			$_SESSION['id']=$row['id'];
			header('location:sukses.php');
		}
	}
	else{
		header('location:index.php');
		$_SESSION['message']="Login Please!";
	}
?>