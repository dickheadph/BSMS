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
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
	<link rel="icon" href="../dist/images/logo.png">
	<title>Barangay Services Management System</title>

  	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
	<link rel="stylesheet" href="../dist/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dist/css/sb-admin.css">
	<link rel="stylesheet" href="../dist/fullcalendar/fullcalendar.min.css">

	<script src="../dist/fullcalendar/lib/jquery.min.js"></script>
	<script src="../dist/fullcalendar/lib/moment.min.js"></script>
	<script src="../dist/fullcalendar/fullcalendar.min.js"></script>

	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>

	<script>
		$(document).ready(function () {
			var calendar = $('#calendar').fullCalendar({
				editable: true,
				events: "fetch-event.php",
				displayEventTime: false,
				eventClick: function (event) {
					Swal.fire({
						title: event.resFName+" "+event.resLName,
						icon: "info",
						text: event.type+" (Status: "+event.status+")",
						showConfirmButton: true,
						showCancelButton: false,
						timer: false
					});
				}
			});
		});
	</script>

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
			div.content-wrapper{
				margin-top: 50px;
			}
		}
		#calendar {
	        width: 700px;
	        margin: 0 auto;
	    }
	</style>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
	<!-- Navigation-->
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
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Calendar">
					<a class="nav-link active" href="calendar.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-calendar"></i>
						<span class="nav-link-text">Calendar</span>
					</a>
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
	<!-- End of Navigation-->

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="calendar.php?adminID=<?php echo($adminID)?>">Calendar</a>
				</li>
				<li class="breadcrumb-item active">Events</li>
			</ol>
			<div id='calendar' style="background-color: #f8a698; margin-top: 0px;"></div>
		</div>
		<!-- /.container-fluid-->
	</div>

	<!-- Profile Modal-->
	<?php include '../profileModal.php'; ?>

	<!-- Logout Modal-->
	<?php include '../logout.php'; ?>

	<script src="../dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>