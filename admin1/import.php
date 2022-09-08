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

  	<link rel="icon" href="../dist/images/logo.png">
	<title>Barangay Services Management System</title>

  	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
	<link rel="stylesheet" href="../dist/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dist/vendor/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../dist/css/sb-admin.css">

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
		input[type="file"]{
			background-color: transparent;
			border: none;
		}
		@media (max-width: 760px){
			div.content-wrapper{
				margin-top: 50px;
			}
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
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="List">
					<a class="nav-link active" href="import.php?adminID=<?php echo ($adminID)?>" style="color: white;">
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

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="import.php?adminID=<?php echo($adminID)?>">Import</a>
				</li>
				<li class="breadcrumb-item active">Import Multiple Residents</li>
			</ol>
			<form method="POST" enctype="multipart/form-data">
	        	<div class="row">
	        		<div class="col">
	            		<input type="file" name="upload" class="form-control">
	        		</div>
	        		<div class="col">
	            		<input type="submit" name="btnUpload" value="Import File">
	        		</div>
	        	</div>
	        </form>
			<?php
				//VALIDATION FOR INSERTING/IMPORT MULTIPLE RESIDENTS
				if (isset($_POST["btnUp"])) {
					foreach ($_POST["resFName"] as $index => $value) {
						$resFName = $_POST["resFName"][$index];
						$resMName = $_POST["resMName"][$index];
						$resLName = $_POST["resLName"][$index];
						$resSex = $_POST["resSex"][$index];
						$resNum = $_POST["resNum"][$index];
						$resAge = $_POST["resAge"][$index];
						$resBday = $_POST["resBday"][$index];
						$resStatus = $_POST["resStatus"][$index];
						$resHouseNum = $_POST["resHouseNum"][$index];
						$resZone = $_POST["resZone"][$index];

						mysqli_query($con, "INSERT INTO resident(resFName, resMName, resLName, resSex, resNum, resAge, resBday, resStatus, resHouseNum, resZone) VALUES('$resFName', '$resMName', '$resLName', '$resSex', '$resNum', '$resAge', '$resBday', '$resStatus', '$resHouseNum', '$resZone')");
						echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Imported successfully!',
							                    icon: 'success',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			}).then(function() {
											    window.location = 'list.php?adminID=$_SESSION[adminID]';
											});</script>";
					}
				}

				if (isset($_POST['btnUpload'])) {
					echo "<hr>
						<br>
						<table id='dataTable' class='table tbl table-striped table-bordered' width='100%'>
							<thead>
								<tr class='font-weight-bold'>
									<td>First Name</td>
									<td>Middle Name</td>
									<td>Last Name</td>
									<td>Sex</td>
									<td>Number</td>
									<td>Age</td>
									<td>Birthdate</td>
									<td>Status</td>
									<td>House Number</td>
									<td>Zone</td>
								</tr>
							</thead>";

					$filename=$_FILES['upload']['tmp_name'];
					if ($_FILES['upload']['size']>0) {
						$file=fopen($filename, "r");
						$row=1;

						$resFName=$resMName=$resLName=$resSex=$resNum=$resAge=$resBday=$resStatus=$resHouseNum=$resZone="";
						$fullname=$button="";
						$resFNameErr=$resMNameErr=$resLNameErr=$resSexErr=$resNumErr=$resAgeErr=$resBdayErr=$resStatusErr=$resHouseNumErr=$resZoneErr="";

						echo "<form method='POST'>";
						while (($getData=fgetcsv($file,10000,",")) !== FALSE) {
							if ($row==1) { $row++; continue; }

							if (empty($getData[0])) { $resFNameErr="First Name is required! <br>"; }else{ $resFName = $getData[0]; }
							if (empty($getData[1])) { $resMName=$getData[1]; }else{ $resMName = $getData[1]; }
							if (empty($getData[2])) { $resLNameErr="Last Name is required! <br>"; }else{ $resLName = $getData[2]; }
							if (empty($getData[3])) { $resSexErr="Sex is required! <br>"; }else{ $resSex = $getData[3]; }
							if (empty($getData[4])) { $resNumErr="Contact Number is required! <br>"; }else{ $resNum = $getData[4]; }
							if (empty($getData[5])) { $resAgeErr="Age is required! <br>"; }else{ $resAge = $getData[5]; }
							if (empty($getData[6])) { $resBdayErr="Birthdate is required! <br>"; }else{ $resBday = $getData[6]; }
							if (empty($getData[7])) { $resStatusErr="Civil Status is required! <br>"; }else{ $resStatus = $getData[7]; }
							if (empty($getData[8])) { $resHouseNumErr="House Number is required! <br>"; }else{ $resHouseNum = $getData[8]; }
							if (empty($getData[9])) { $resZoneErr="Zone is required! <br>"; }else{ $resZone = $getData[9]; }

							if ($resFName && $resMName && $resLName && $resSex && $resNum && $resAge && $resBday && $resStatus && $resHouseNum && $resZone) {
								$fullname=ucwords($resFName)." ".ucwords($resMName[0])." ".ucwords($resLName);
								$button="<input type='submit' name='btnUp' value='Upload Now'>";
							}

							echo "<input type='hidden' name='resFName[]' value='$resFName'>
								<input type='hidden' name='resMName[]' value='$resMName'>
								<input type='hidden' name='resLName[]' value='$resLName'>
								<input type='hidden' name='resSex[]' value='$resSex'>
								<input type='hidden' name='resNum[]' value='$resNum'>
								<input type='hidden' name='resAge[]' value='$resAge'>
								<input type='hidden' name='resBday[]' value='$resBday'>
								<input type='hidden' name='resStatus[]' value='$resStatus'>
								<input type='hidden' name='resHouseNum[]' value='$resHouseNum'>
								<input type='hidden' name='resZone[]' value='$resZone'>";

							echo "<tbody>
									<tr>
										<td>$resFName</td>
										<td>$resMName</td>
										<td>$resLName</td>
										<td>$resSex</td>
										<td>$resNum</td>
										<td>$resAge</td>
										<td>$resBday</td>
										<td>$resStatus</td>
										<td>$resHouseNum</td>
										<td>$resZone</td>
									</tr>
								";
						}
						echo "<tr>
							<td colspan='11'>
								<center>$button</center>
							</td>
							</tr>";

						echo "</form>";

						echo "<tr>
								<td colspan='11'>
									<center>
										<span class='error'>
											$resFNameErr
											$resMNameErr
											$resLNameErr
											$resSexErr
											$resNumErr
											$resAgeErr
											$resBdayErr
											$resStatusErr
											$resHouseNumErr
											$resZoneErr
										</span>
									</center>
								</td>
							</tr>";
					}else{
						echo "<script type='text/javascript'>Swal.fire({
							                    title: 'There is no file to be imported!',
							                    icon: 'error',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			});</script>";
					}
					echo "</tbody>
						</table>";
				}
			?>
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
	<script type="text/javascript">
		$('#dataTable').DataTable({
			dom: "Brtp",
			"pagingType": "full_numbers",
			language: {
				paginate: {
					first: '<i class="fa fa-fw fa-angle-double-left">',
					previous: '<i class="fa fa-fw fa-angle-left">',
					next: '<i class="fa fa-fw fa-angle-right">',
					last: '<i class="fa fa-fw fa-angle-double-right">'
				}
			}
		});
	</script>
</body>
</html>