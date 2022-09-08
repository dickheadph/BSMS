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
	<link href="../dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../dist/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../dist/css/sb-admin.css" rel="stylesheet">

	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.css" />
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

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
		h3{
			color: white;
		}
		input.form-control{
			background-color: transparent;
		}
		div img{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
		a.print_link:link, a.print_link:visited, a.print_link:hover, a.print_link:active { 
			text-decoration: none; 
		}
		.txtarea{
			border:1px solid #999999;
			width:100%;
			margin:5px 0;
			padding:3px;
			overflow-y: scroll;
			background-color: white;
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
							<a class="active" href="blotter.php?adminID=<?php echo ($adminID)?>" style="color: white;"><i class="fa fa-fw fa-video-camera"></i> Blotter</a>
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
	<!-- End of Navigation-->

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="blotter.php?adminID=<?php echo($adminID)?>">Request</a>
				</li>
				<li class="breadcrumb-item active">Blotter Complaints</li>
			</ol>
			<div class="table-responsive">
				<table id="dataTable" class="table tbl table-striped table-bordered" width="100%" style="text-align: center;">
					<thead>
						<tr>
							<th>Date & Time</th>
	    					<th>Complainant</th>
	    					<th>Respondent</th>
	    					<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
	            $query=mysqli_query($con, "SELECT * FROM blotter ORDER BY bDate DESC");
	            while ($row=mysqli_fetch_assoc($query)) {
	                $bID=$row['bID'];
					$qry = mysqli_query($con, "SELECT * FROM resident WHERE resID = '$row[resID]'");
					$ct = mysqli_num_rows($qry);
					if ($ct > 0) {
			            $roww = mysqli_fetch_assoc($qry);
			            $full = ucwords($roww['resFName'])." ".ucwords($roww['resLName']);

			            $qry = mysqli_query($con, "SELECT * FROM suspect WHERE sID = '$row[sID]'");
						$ctt = mysqli_num_rows($qry);
				        if ($ctt > 0) {
				        	$row_suspect = mysqli_fetch_assoc($qry);
				        	$suspectName = ucwords($row_suspect['fName'])." ".ucwords($row_suspect['lName']);
	        ?>			<tr>
    						<td><?php echo date('F j, Y',strtotime($row['bDate']))." ".date('H:i A', strtotime($row['bTime']))?></td>
    						<td><?php echo $full ?></td>
    						<td><?php echo $suspectName ?></td>
    						<td>
    							<button type="button" class="btn btn-primary btn-xs dt-view" data-placement="bottom" title="View" data-toggle="modal" data-target="#view_modal<?php echo $bID; ?>">
					    			<i class="fa fa-fw fa-eye"></i>
					    		</button>
    						</td>
    					</tr>

    					<!-- View Modal -->
    					<div class="modal fade" id="view_modal<?php echo $bID; ?>" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="view_modalLabel" style="color: white">DETAILS</h5>
									</div>
									<div class="modal-body" style="color: white">
										<div class="row">
											<input type="hidden" name="bID" value="<?php echo($row['bID'])?>">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<i class="fa fa-calendar"></i> <label class="control-label">Date and Time of Complaint</label>
												<div class="form-group">
													<input type="text" class="form-control" value="<?php echo date('M d, Y',strtotime($row['bDate'])).' '.date('H:i A',strtotime($row['bTime']));?>" disabled>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<i class="fa fa-user"></i> <label class="control-label">Complainant</label>
												<div class="form-group">
													<input type="text" class="form-control" value="<?php echo($full);?>" disabled>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<i class="fa fa-user"></i> <label class="control-label">Respondent</label>
												<div class="form-group">
													<input type="text" class="form-control" value="<?php echo($suspectName);?>" disabled>
												</div>
											</div>
										</div>
												<i class="fa fa-file"></i> <label class="control-label">Details: </label>
												<div class="form-group">
													<textarea class="txtarea" cols="2" rows="7" name="details" disabled><?php echo $row['details'];?></textarea>
												</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<img src="../uploaded/images/<?php echo($row['bImage'])?>" width="100%" alt="No image to show">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
												<video width="100%" controls="controls autoplay">
													<source src="../uploaded/videos/<?php echo($row['bVideo'])?>" type="video/mp4">
												</video>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button class="btn" style="background-color: #f8a698" type="button">
											<a style='color: black' target='_Blank' class="print_link" href='blotterPrint.php?bID=<?php echo $row['bID']?>'><i class='fa fa-print'></i> Print</a>
										</button>
										<button class="btn" style="background-color: #f8a698" type="button" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
									</div>
								</div>
							</div>
						</div>

						<?php
							}}}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.container-fluid-->
	</div>

	<!-- Profile Modal-->
	<?php include '../profileModal.php'; ?>

	<!-- Logout Modal-->
	<?php include '../logout.php'; ?>

	<script src="../dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
	    var table = $('#dataTable').DataTable( {
	        dom:  'T<"clear">frtip',
			"targets": 'no-sort',
			"bSort": false,
			"order": [],
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
