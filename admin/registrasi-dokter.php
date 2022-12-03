<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid'] == 0)) {
	header('location:../doctor/logout.php');
} else {
	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$mobno = $_POST['mobno'];
		$email = $_POST['email'];
		$sid = $_POST['specializationid'];
		$password = md5($_POST['password']);
		$role = $_POST['role'];
		$ret = "select Email from tbldoctor where Email=:email";
		$query = $dbh->prepare($ret);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() == 0) {
			$sql = "Insert Into tbldoctor(FullName,MobileNumber,email,Specialization,password,role)Values(:fname,:mobno,:email,:sid,:password, '2')";
			$query = $dbh->prepare($sql);
			$query->bindParam(':fname', $fname, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
			$query->bindParam(':sid', $sid, PDO::PARAM_INT);
			$query->bindParam(':password', $password, PDO::PARAM_STR);
			$query->execute();
			$lastInsertId = $dbh->lastInsertId();
			if ($lastInsertId) {
				$sql2 = "Insert Into tbl(MobileNumber,email,password,role)Values(:mobno,:email,:password, '2')";
				$query2 = $dbh->prepare($sql2);
				$query2->bindParam(':email', $email, PDO::PARAM_STR);
				$query2->bindParam(':mobno', $mobno, PDO::PARAM_INT);
				$query2->bindParam(':password', $password, PDO::PARAM_STR);
				$query2->execute();

				echo "<script>alert('You have signup  Successfully');</script>";
			} else {

				echo "<script>alert('Something went wrong.Please try again');</script>";
			}
		} else {

			echo "<script>alert('Email-id already exist. Please try again');</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>On-Clinic - Profil Admin</title>

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
	<!--============= start main area -->

	<?php include_once('includes/header.php'); ?>

	<?php include_once('includes/sidebar.php'); ?>

	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				<div class="row">

					<div class="col-md-12">
						<div class="widget">
							<header class="widget-header">
								<h3 class="widget-title">Registrasi Dokter</h3>
							</header><!-- .widget-header -->
							<hr class="widget-separator">
							<div class="widget-body">
								<?php
								$did = $_SESSION['damsid'];
								$sql = "SELECT * from  tblemployee where ID=:did";
								$query = $dbh->prepare($sql);
								$query->bindParam(':did', $did, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {               ?>
										<form class="form-horizontal" method="post">
											<div class="form-group">
												<label for="exampleTextInput1" class="col-sm-3 control-label">Nama Lengkap:</label>
												<div class="col-sm-9">
													<input id="fname" type="text" class="form-control" placeholder="Nama Lengkap" name="fname" required="true" value="<?php echo $row->FullName; ?>">
												</div>
											</div>
											<div class="form-group">
												<label for="email2" class="col-sm-3 control-label">Email:</label>
												<div class="col-sm-9">
													<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="true">
												</div>
											</div>
											<div class="form-group">
												<label for="email2" class="col-sm-3 control-label">Nomor Telepon:</label>
												<div class="col-sm-9">
													<input id="email" type="text" class="form-control" placeholder="Nomor Telepon" name="mobno" required="true">
												</div>
											</div>
											<div class="form-group">
												<label for="email2" class="col-sm-3 control-label">Pilih Poli:</label>
												<select class="form-control" name="specializationid" style="width: 130vh; margin: auto">
													<option value=""></option>
													<?php
													$sql1 = "SELECT * from tblspecialization";
													$query1 = $dbh->prepare($sql1);
													$query1->execute();
													$results1 = $query1->fetchAll(PDO::FETCH_OBJ);

													$cnt = 1;
													if ($query1->rowCount() > 0) {
														foreach ($results1 as $row1) {               ?>

															<option value="<?php echo htmlentities($row1->ID); ?>"><?php echo htmlentities($row1->Specialization); ?></option>
														<?php $cnt = $cnt + 1;
														} ?>
												</select>
											</div>
											<div class="form-group">
												<label for="email2" class="col-sm-3 control-label">Kata Sandi:</label>
												<div class="col-sm-9">
													<input id="email" type="text" class="form-control" placeholder="Kata Sandi" name="password" required="true">
												</div>
											</div>
									<?php $cnt = $cnt + 1;
													}
												} ?>
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button type="submit" class="btn btn-success" name="submit">Registrasi</button>
										</div>
									</div>
										</form>
							</div><!-- .widget-body -->
						</div><!-- .widget -->
					</div><!-- END column -->

				</div><!-- .row -->
			</section><!-- #dash-content -->
		</div><!-- .wrap -->
		<!-- APP FOOTER -->
		<?php include_once('includes/footer.php'); ?>
		<!-- /#app-footer -->
	</main>
	<!--========== END app main -->

	<?php include_once('includes/customizer.php'); ?>

	<!-- SIDE PANEL -->


	<!-- build:js assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>
</body>

</html>
<?php }  ?>