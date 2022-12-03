<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$newpassword = md5($_POST['newpassword']);
	$sql = "SELECT email FROM tbl WHERE email=:email and MobileNumber=:mobile";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$con = "update tbl set password=:newpassword where email=:email and MobileNumber=:mobile";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
		$chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		echo "<script>alert('Kata sandi berhasil diubah');</script>";
	} else {
		echo "<script>alert('Email/Nomor HP tidak valid');</script>";
	}
}

?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>On-Clinic - Lupa Kata Sandi</title>


	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body class="simple-page">
	<div id="back-to-home">
		<a href="../index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">

			<span style="color: white"><i class="fa fa-gg"></i></span>
			<span style="color: white">On-Clinic</span>

		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
			<h4 class="form-title m-b-xl text-center">Reset Kata Sandi</h4>
			<form method="post" name="chngpwd" onSubmit="return valid();">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Alamat Email" required="true" name="email">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="mobile" placeholder="Nomor HP" required="true">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="newpassword" placeholder="Password Baru" required="true" />
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="confirmpassword" placeholder="Konfirmasi Password" required="true" />
				</div>


				<input type="submit" class="btn btn-primary" name="submit" value="RESET">
			</form>
		</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p style="color: white">Apakah Anda sudah mempunyai akun ?<a href="../doctor/login.php"> MASUK</a></p>

		</div><!-- .simple-page-footer -->


	</div><!-- .simple-page-wrap -->
</body>

</html>