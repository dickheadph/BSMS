<?php
	//database connection
	include '../connection.php';

	$navbartext = "";

	if (isset($_SESSION['adminID'])) {
		$quer = mysqli_query($con, "SELECT * FROM admin WHERE adminID = '$_SESSION[adminID]'");
		$count = mysqli_num_rows($quer);
		if ($count > 0) {
			$row = mysqli_fetch_assoc($quer);
			$adminID = $row['adminID'];
			$adminFName = $row['adminFName'];
			$adminLName = $row['adminLName'];
			$adminCode = $row['adminCode'];
			$type = ucwords($row['type']);
			$full = ucwords($row['adminFName'])." ".ucwords($row['adminLName']);
		}
		$navbartext="<span class='navbar-text' style='padding: 0px;'>
						<li class='nav-item dropdown' style='list-style-type:none;'>
							<a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							".$full." (Brgy. ".$type.")
							</a>
							<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink' style='background-color: #c2523e;'>
								<a class='dropdown-item' data-toggle='modal' data-target='#profileModal'>
									<i class='fa fa-fw fa-user'></i>Profile
								</a>
								<a class='dropdown-item' data-toggle='modal' data-target='#exampleModal'>
									<i class='fa fa-fw fa-sign-out'></i>Logout
								</a>
							</div>
						</li>
					</span>";
	}else{
		echo "<script>window.location.href='../index.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
	<link rel="icon" href="../dist/images/logo.png">
	<title>Barangay Services Management System</title>

  	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
	<link href="../dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../dist/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../dist/css/sb-admin.css" rel="stylesheet">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>

	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
	
	<style type="text/css">
		a.dropdown-item:hover, .log:hover{
			background-color: #c2523e;
			font-size: 17px;
			cursor: pointer;
		}
		nav{
			background-color: #c2523e;
		}
		div.total{
			background: #c2523e;
		}
		.active{
			background-color: #ffffff26;
		}
		.modal-content {
			background-color: #c2523e;
		}
		.reader{
			width: 700px;
			margin: 0 auto;
		}
		@media (max-width: 760px){
			div.card-body{
				overflow: scroll;
			}
			div.reader{
				width: 400px;
			}
			div.content-wrapper{
				margin-top: 50px;
			}
		}
	</style>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<h5 class="header5" style="font-size: 20px; margin-left: 0%;"><img src="../dist/images/logo.png" width="5%">Barangay Services Management System</h5>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="background-color: #c2523e;">
				<br>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="dashboard.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="List">
					<a class="nav-link" href="list.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-users"></i>
						<span class="nav-link-text">List</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="List">
					<a class="nav-link" href="import.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-list"></i>
						<span class="nav-link-text">Import Residents</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requests">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion" style="color: white;">
						<i class="fa fa-fw fa-file"></i>
						<span class="nav-link-text">Requests</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapseExamplePages" style="background-color: #c2523e;">
						<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Documents">
							<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePagess" data-parent="#exampleAccordion" style="color: white;">
								<i class="fa fa-fw fa-file"></i>
								<span class="nav-link-text">Documents</span>
							</a>
							<ul class="sidenav-second-level collapse" id="collapseExamplePagess" style="background-color: #c2523e;">
								<li>
									<a href="docPending.php?adminID=<?php echo ($adminID)?>" style="color: white; margin-left: 30px;">PENDING</a>
								</li>
								<li>
									<a href="docPaid.php?adminID=<?php echo ($adminID)?>" style="color: white; margin-left: 30px;">PAID</a>
								</li>
								<li>
									<a href="docComplete.php?adminID=<?php echo ($adminID)?>" style="color: white; margin-left: 30px;">COMPLETED</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="blotter.php?adminID=<?php echo ($adminID)?>" style="color: white;"><i class="fa fa-fw fa-video-camera"></i> Blotter</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Scan QR">
					<a class="nav-link active" href="scan.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-qrcode"></i>
						<span class="nav-link-text">Scan QR</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Calendar">
					<a class="nav-link" href="calendar.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-calendar"></i>
						<span class="nav-link-text">Calendar</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Archive">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePages" data-parent="#exampleAccordion" style="color: white;">
						<i class="fa fa-fw fa-archive"></i>
						<span class="nav-link-text">Archive</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapsePages" style="background-color: #c2523e;">
						<li>
							<a href="archiveDoc.php?adminID=<?php echo ($adminID)?>" style="color: white;"><i class="fa fa-fw fa-file"></i> Documents</a>
						</li>
						<li>
							<a href="archiveBlotter.php?adminID=<?php echo ($adminID)?>" style="color: white;"><i class="fa fa-fw fa-video-camera"></i> Blotter</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav sidenav-toggler" style="background-color: #c2523e;">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left" style="color: white;"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto"></ul>
			<?php echo $navbartext; ?>
		</div>
	</nav>
	<!-- End of Navigation -->

	<?php
		if (isset($_POST['requestID'])) {
			$qrr = mysqli_query($con, "SELECT requestID FROM request");
			while ($row = mysqli_fetch_array($qrr)) {
				$requestID = md5($row['requestID']);
			}
			if ($requestID = $_POST['requestID']) {
				$qry = mysqli_query($con, "SELECT * FROM request WHERE md5(requestID)='$requestID' AND status ='PAID'");
				$ct = mysqli_num_rows($qry);
				if ($ct > 0) {
					echo "<script type='text/javascript'>Swal.fire({
					                    title: 'Fully paid!',
					                    icon: 'success',
					                    showConfirmButton: true,
										showCancelButton: false,
					                    timer: 3000
	                    			}).then(function() {
									    window.location = 'docPaid.php?adminID=$_SESSION[adminID]&&requestID=$requestID';
									});</script>";
				}else {
					echo "<script type='text/javascript'>Swal.fire({
					                    title: 'Not yet paid!',
					                    icon: 'error',
					                    showConfirmButton: true,
										showCancelButton: false,
					                    timer: 3000
	                    			});</script>";
				}
			}
		}
	?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="scan.php?adminID=<?php echo($adminID)?>">Scan QR Code</a>
				</li>
			</ol>

			<!-- QR Scanner -->
			<div class="reader">
				<video id="preview" width="100%"></video>
			</div>
			<form method="POST">
				<div id="qr-reader-results">
					<input type="hidden" name="requestID" id="requestID">
				</div>
			</form>

			<script type="text/javascript">
				let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
				Instascan.Camera.getCameras().then(function(cameras){
					if (cameras.length > 0) {
						scanner.start(cameras[0]);
					}else {
						alert('No cameras found');
					}
				}).catch(function(e) {
					console.error(e);
				});

				scanner.addListener('scan', function(c){
					document.getElementById('requestID').value=c;
					document.forms[0].submit();
				});
			</script>

		</div>
		<!-- /.container-fluid-->
	</div>

	<!-- Profile Modal-->
	<?php include '../profileModal.php'; ?>

	<!-- Logout Modal-->
	<?php include '../logout.php'; ?>

	<script src="../dist/vendor/jquery/jquery.min.js"></script>
	<script src="../dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../dist/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="../dist/js/sb-admin.min.js"></script>
</body>
</html>