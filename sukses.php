<?php
	session_start();
 
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('index.php');
		exit();
	}
	include('koneksi.php');
	$query=mysqli_query($koneksi,"select * from user where id='".$_SESSION['id']."'");
	$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
</head>
<body>
	<h2>Login Sukses</h2>
	<?php echo $row['username']; ?>
	<br>
	<a  href="logout.php">Logout</a>
</body>
</html>