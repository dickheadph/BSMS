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
	<link rel="stylesheet" href="../dist/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dist/vendor/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../dist/css/sb-admin.css">
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>
	

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
		@media (max-width: 760px){
			div.card-body{
				overflow: scroll;
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
					<a class="nav-link active" href="dashboard.php?adminID=<?php echo ($adminID)?>" style="color: white;">
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
					<a class="nav-link" href="scan.php?adminID=<?php echo ($adminID)?>" style="color: white;">
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
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requests">
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
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="dashboard.php?adminID=<?php echo($adminID)?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">My Dashboard</li>
			</ol>
			<!-- Icon Cards-->
			<div class="row">
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="total card text-white o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-home"></i>
							</div>
							<div class="mr-5">
								<?php
									$sql = "SELECT count(*) AS resID FROM resident";
									$query = mysqli_query($con, $sql);
									$result = mysqli_fetch_array($query);
									echo $result['resID'];
								?> Total Resident
							</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="#"></a>
					</div>
				</div>
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="total card text-white o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-file"></i>
							</div>
							<div class="mr-5">
								<?php
									$sql = "SELECT count(*) AS requestID FROM request";
									$query = mysqli_query($con, $sql);
									$result = mysqli_fetch_array($query);
									echo $result['requestID'];
								?> Total Request
							</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="#"></a>
					</div>
				</div>
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="total card text-white o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-users"></i>
							</div>
							<div class="mr-5">
								<?php
									$sql = "SELECT count(*) AS bID FROM blotter";
									$query = mysqli_query($con, $sql);
									$result = mysqli_fetch_array($query);
									echo $result['bID'];
								?> Total Blotter
							</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="#"></a>
					</div>
				</div>
			</div>
			<!-- Area Chart-->
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mb-3">
					<div class="card mb-3">
						<div class="card-header"><i class="fa fa-area-chart"></i> Total Request</div>
						<script type="text/javascript">
							google.charts.load('current', {'packages':['corechart']});
							google.charts.setOnLoadCallback(drawChart);

							function drawChart() {
								var data = google.visualization.arrayToDataTable([
									['Month', 'Document'],
									<?php
										$res = mysqli_query($con, "SELECT MONTHNAME(dDate) as ym, COUNT(*) AS month FROM request GROUP BY ym ORDER BY dDate ASC");
										while($r = mysqli_fetch_array($res)){
											echo "['".$r["ym"]."', ".$r["month"]."],";
										}
									?>
								]);

								var options = {
									legend: { position: 'bottom' }
								};

								var chart = new google.visualization.LineChart(document.getElementById('lineChart_document'));

								chart.draw(data, options);
							}


						</script>
						<div class="card-body" id="lineChart_document"></div>
					</div>
					
					<div class="card mb-3">
						<div class="card-header"><i class="fa fa-area-chart"></i> Total Complaint</div>
						<script type="text/javascript">
							google.charts.load('current', {'packages':['corechart']});
							google.charts.setOnLoadCallback(drawChart);

							function drawChart() {
								var data = google.visualization.arrayToDataTable([
									['Month', 'Complaint'],
									<?php
										$rs = mysqli_query($con, "SELECT MONTHNAME(bDate) as datee, COUNT(*) AS m FROM blotter GROUP BY datee ORDER BY bDate ASC");
										while($row3 = mysqli_fetch_array($rs)){
											echo "['".$row3["datee"]."', ".$row3["m"]."],";
										}
									?>
								]);

								var options = {
									line: {groupWidth: "40%"},
									legend: { position: 'bottom' }
								};

								var chart = new google.visualization.LineChart(document.getElementById('lineChart_blotter'));

								chart.draw(data, options);
							}


						</script>
						<div class="card-body" id="lineChart_blotter"></div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 mb-3">
					<div class="card mb-3" style="height: 80%;">
						<div class="card-header"><i class="fa fa-bar-chart"></i> Total Resident Based on Age</div>
						<script type="text/javascript">
							google.charts.load('current', {'packages':['corechart']});
							google.charts.setOnLoadCallback(drawChart);

							function drawChart(){
								var data = google.visualization.arrayToDataTable([
									["Age", "Count", { role: "style" } ],
									<?php
										$query = "SELECT resAge, count(*) as number FROM resident GROUP BY resAge";
										$result = mysqli_query($con, $query);
										while($row = mysqli_fetch_array($result)){
											echo "['".$row["resAge"]."', ".$row["number"].",";
									?>
										"#c2523e"
									<?php
										echo "],";
										}
									?>
								]);

								var options = {
									bar: {groupWidth: "40%"},
									legend: { position: "none" },
								};

								var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
								chart.draw(data, options);
							}
						</script>
						<div class="card-body" id="bar_chart">
						</div>
					</div>
				</div>
			</div>
			
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
	<script src="../dist/vendor/datatables/jquery.dataTables.js"></script>
	<script src="../dist/vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="../dist/js/sb-admin.min.js"></script>
	<script src="../dist/js/sb-admin-datatables.min.js"></script>
</body>
</html>