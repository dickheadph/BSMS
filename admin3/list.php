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

	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.js"></script>
    
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
		.numberTag{
			border-left: none;
			border-top: none;
			border-right: none;
			width: 50px;
			margin-right: 10px;
		}
		.dropdown{
			list-style-type: none;
		}
		.headItem{
			margin-top: -25px;
			margin-left: 42px;
		}
		.dropdown-menu{
			border-radius: 0;
			padding: 10px;
			width: 145%;
		}

		@media print {
			.tbl th:nth-child(1) { display: none; }
	        .tbl td:nth-child(1) { display: none; }
	        .tbl th:nth-child(10) { display: none; }
	        .tbl td:nth-child(10) { display: none; }
			@page {
				size: landscape;
			}
	    }

		@media (max-width: 760px) {
			div.content-wrapper{
				margin-top: 50px;
			}
		}

		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
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
					<a class="nav-link active" href="list.php?adminID=<?php echo ($adminID)?>" style="color: white;">
						<i class="fa fa-fw fa-users"></i>
						<span class="nav-link-text">List</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Calendar">
					<a class="nav-link" href="calendar.php?adminID=<?php echo ($adminID)?>" style="color: white;">
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
					<a href="list.php?adminID=<?php echo($adminID)?>">List</a>
				</li>
				<li class="breadcrumb-item active">Resident's List</li>
			</ol>
			<div id="printbar" style="float:right"></div>
			<form method="post" action="" class="form-inline" style="margin-bottom: 5px; float: left;">
				<label style="margin-left: 15px; margin-right: 15px; font-weight: bold;">Age</label>
				<input type="number" placeholder="Start" class="numberTag" name="age1">
				<input type="number" placeholder="End" class="numberTag" name="age2">

				<button class="btn save" name="search" style="margin-right: 2px;"><span><i class="fa fa-search"></i></span></button>
			</form>
			<div class="table-responsive">
				<table id="dataTable" class="table tbl table-striped table-bordered" width="100%" style="text-align: center;">
					<thead>
						<tr>
							<th>ID</th>
	    					<th>Name</th>
	    					<th>Sex</th>
	    					<th>Number</th>
	    					<th>Age</th>
	    					<th>Birthdate</th>
	    					<th>Status
	    						<ul class="headItem">
	    							<li class="dropdown">
	    								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
	    									<b class="caret"></b>
	    								</a>
	    								<ul class="dropdown-menu" style="padding: 0px 0px 0px 30px; overflow-y: auto; height: 180px;">
	    									<form method="POST" action="">
	    										<li style="color: #333;">
		    										<label class="checkbox">
		    											<input type="radio" id="check" name="status" value="SINGLE"> SINGLE <br/>
		    											<input type="radio" id="check" name="status" value="MARRIED"> MARRIED <br/>
		    											<input type="radio" id="check" name="status" value="DIVORCED"> DIVORCED <br/>
		    											<input type="radio" id="check" name="status" value="WIDOWED"> WIDOWED <br/>
		    										</label>
		    									</li>
	    									
	    										<div class="modal-footer">
	    											<input type="submit" name="findStatus" class="btn edit btn-sm" value="Apply">
		    										<!-- <button type="submit" id="findStatus" class="btn edit btn-sm">Apply</button> -->
		    									</div>
	    									</form>
	    								</ul>
	    							</li>
	    						</ul>
	    					</th>
	    					<th>House Number</th>
	    					<th>Zone
	    						<ul class="headItem">
	    							<li class="dropdown">
	    								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
	    									<b class="caret"></b>
	    								</a>
	    								<ul class="dropdown-menu" style="padding: 0px 0px 0px 30px; overflow-y: auto; height: 180px;">
	    									<form method="POST" action="">
	    										<li style="color: #333;">
		    										<label class="radio">
		    											<input type="radio" id="check" name="zone" value="1"> 1 <br/>
		    											<input type="radio" id="check" name="zone" value="2"> 2 <br/>
		    											<input type="radio" id="check" name="zone" value="3"> 3 <br/>
		    											<input type="radio" id="check" name="zone" value="4"> 4 <br/>
		    											<input type="radio" id="check" name="zone" value="5"> 5 <br/>
		    											<input type="radio" id="check" name="zone" value="6"> 6 <br/>
		    											<input type="radio" id="check" name="zone" value="7"> 7 <br/>
		    										</label>
		    									</li>
	    									
	    										<div class="modal-footer">
	    											<input type="submit" name="findZone" class="btn edit btn-sm" value="Apply">
		    										<!-- <button type="submit" id="findStatus" class="btn edit btn-sm">Apply</button> -->
		    									</div>
	    									</form>
	    								</ul>
	    							</li>
	    						</ul>
	    					</th>
						</tr>
					</thead>
					<tbody>
		<?php
			if (isset($_POST['findStatus'])) {
				$status = $_POST['status'];

				$query=mysqli_query($con, "SELECT * FROM resident WHERE resStatus = '$status'") or die(mysqli_error());
				$row2=mysqli_num_rows($query);
				if($row2>0){
					while($fetch=mysqli_fetch_array($query)){ ?>
						<tr>
							<td><?php echo $fetch['resID'] ?></td>
							<td><?php echo ucwords($fetch['resFName'])." ".ucwords($fetch['resMName'])." ".ucwords($fetch['resLName'])?></td>
							<td><?php echo strtoupper($fetch['resSex'])?></td>
							<td><?php echo strtoupper($fetch['resNum'])?></td>
							<td><?php echo strtoupper($fetch['resAge'])?></td>
							<td><?php echo date("M d, Y", strtotime ($fetch['resBday']))?></td>
							<td><?php echo strtoupper($fetch['resStatus'])?></td>
							<td><?php echo strtoupper($fetch['resHouseNum'])?></td>
							<td><?php echo strtoupper($fetch['resZone'])?></td>
						</tr>
		<?php 	}	}else{
					echo'<tr>
							<td colspan = "10"><center>Record Not Found</center></td>
						</tr>';
				}
			}else if(isset($_POST['search'])){
				$age1 = $_POST['age1'];
				$age2 = $_POST['age2'];
				$query=mysqli_query($con, "SELECT * FROM `resident` WHERE `resAge` BETWEEN '$age1' AND '$age2'") or die(mysqli_error());
				$row2=mysqli_num_rows($query);
				if($row2>0){
					while($fetch=mysqli_fetch_array($query)){
		?>
						<tr>
							<td><?php echo $fetch['resID'] ?></td>
    						<td><?php echo ucwords($fetch['resFName'])." ".ucwords($fetch['resMName'])." ".ucwords($fetch['resLName'])?></td>
    						<td><?php echo strtoupper($fetch['resSex'])?></td>
    						<td><?php echo strtoupper($fetch['resNum'])?></td>
    						<td><?php echo strtoupper($fetch['resAge'])?></td>
    						<td><?php echo date("M d, Y", strtotime ($fetch['resBday']))?></td>
    						<td><?php echo strtoupper($fetch['resStatus'])?></td>
    						<td><?php echo strtoupper($fetch['resHouseNum'])?></td>
    						<td><?php echo strtoupper($fetch['resZone'])?></td>
						</tr>
		<?php 	}	}else{
					echo'<tr>
							<td colspan = "10"><center>Record Not Found</center></td>
						</tr>';
				}
			}else{
				$query=mysqli_query($con, "SELECT * FROM `resident`") or die(mysqli_error());
				while($fetch=mysqli_fetch_array($query)){
		?>
						<tr>
							<td><?php echo $fetch['resID'] ?></td>
    						<td><?php echo ucwords($fetch['resFName'])." ".ucwords($fetch['resMName'])." ".ucwords($fetch['resLName'])?></td>
    						<td><?php echo strtoupper($fetch['resSex'])?></td>
    						<td><?php echo strtoupper($fetch['resNum'])?></td>
    						<td><?php echo strtoupper($fetch['resAge'])?></td>
    						<td><?php echo date("M d, Y", strtotime ($fetch['resBday']))?></td>
    						<td><?php echo strtoupper($fetch['resStatus'])?></td>
    						<td><?php echo strtoupper($fetch['resHouseNum'])?></td>
    						<td><?php echo strtoupper($fetch['resZone'])?></td>
						</tr>
		<?php 	}	}	?>
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
	        dom: 'Brtip',
			buttons: [
				{
					extend:    'print',
					text:      '<i class="fa fa-print"></i> Print',
					className: 'btn edit',
					titleAttr: 'Print',
		            exportOptions: {
		                columns: ':visible',
		            },
					customize: function (win) {
						$(win.document.body).prepend('<img src="data:image/jpeg;base64,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" style="float:left; width: 13%;" /> <p style="text-align:center;">Republic of the Philippines <br/> Province of Camarines Sur <br/> MUNICIPALITY OF NABUA <br/> <b>BARANGAY STA. ELENA BARAS</b> <br/> -o0o-</p> <p style="line-height: 21px; color: #333; background-image:  linear-gradient(180deg, transparent, transparent 19px, blue 20px); text-align: center;"> OFFICE OF THE PUNONG BARANGAY</p>'); 
						$(win.document.body).prepend('<img src="data:image/jpeg;base64,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" style="float:right; width: 13%;" />');
		                $(win.document.body).find('table').addClass('compact').css('font-size', '12px');
		                $(win.document.body).find('h1').css('font-size','20px').text('Barangay Resident\'s List');
		                $(win.document.body).find('th:nth-child(7)').each(function(index){
		                    $(this).text('Status');
		                });
		                $(win.document.body).find('th:nth-child(9)').each(function(index){
		                    $(this).text('Zone');
		                });
		                $(win.document.body).find('tr:nth-child(odd) td').css('background-color','#D0D0D0');
		                $(win.document.body).find('th').css('text-align','center');
		                $(win.document.body).find('td').css('text-align','center');
		            }
				},
				{
					extend:    'csvHtml5',
					text:      '<i class="fa fa-file-text-o"></i> CSV',
					className: 'btn edit',
					titleAttr: 'CSV'
				}
			],
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
	    table.buttons().container().appendTo($('#printbar'));
	</script>
</body>
</html>