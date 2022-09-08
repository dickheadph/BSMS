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
			$full = ucwords($row['adminFName'])." ".ucwords($row['adminLName']);
		}
	}else{
		echo "<script>window.location.href='../index.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="../dist/images/logo.png">
	<title>Barangay Services Management System</title>

	<link rel="stylesheet" type="text/css" href="../dist/css/style.css">
	<link rel="stylesheet" href="../dist/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/vendor/font-awesome/css/font-awesome.min.css">

  	<style type="text/css">
		body{
			font-family: Times New Roman;
		}
		p{
			font-size: 20px;
		}
		h5{
			font-size: 22px;
		}
		.imahe{
			float: left;
			margin-left: 10%;
		}
		.headerr{
			text-align: center;
			font-size: 25px;
			line-height: 1.2;
		}
		.coll1{
			text-align: center;
			margin-top: 5%;
		}
		.coll2{
			text-align: center;
		}
		.coll3{
			margin-top: 8%;
		}
		.cert{
			text-align: center;
			font-size: 25px;
		}
		.name{
			float: right;
			word-spacing: 0px;
			margin-top: 25%;
			font-size: 23px;
		}
		.designation{
			word-spacing: 0px;
			margin-left: 60%;
		}
		.parag2{
			text-align: justify;
		}
		.footer{
			font-style: italic;
			font-family: Arial;
			margin-top: 48%;
		}
		.btn{
			float: right;
		}
	</style>
</head>
<body onload="window.print()">
	<div class="container">
		<img src="../dist/images/logo.png" width="20%" style="margin-left: auto; float: left;">
		<img src="../dist/images/nabua.jpg" width="20%" style="margin-right: auto; float: right;">
		<p class="headerr">Republic of the Philippines <br>
			Province of Camarines Sur <br>
			MUNICIPALITY OF NABUA <br>
			<b>BARANGAY STA. ELENA BARAS</b> <br>
			-o0o- <br>
			OFFICE OF THE PUNONG BARANGAY
		</p>
		<img src="../dist/images/line2.png" width="100%" style="margin-top: 0px;">
		<div class="content">
			<br>
			<h2 class="cert"><u><b> INCIDENT REPORT </b></u></h2>
			<br> <br>
		<?php 
			$bID = $_GET['bID'];
			$query = mysqli_query($con, "SELECT * FROM blotter WHERE bID = $bID");
			$count = mysqli_num_rows($query);
	        if ($count > 0) {
	            $row = mysqli_fetch_assoc($query);
	            $resID = $row['resID']; 
	            $sID = $row['sID']; 
	            $details = $row['details']; 
	    ?>
	        <div class="row">
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<p class="parag1"><b>Date and Time of Incident:</b></p>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
					<p class="parag2"><?php echo date('F d, Y',strtotime($row['bDate'])).' - '.date('H:i A',strtotime($row['bTime']));?></p>
				</div>
			</div>
		<?php    }
			$quer = mysqli_query($con, "SELECT * FROM resident WHERE resID = $resID");
			$ct = mysqli_num_rows($quer);
	        if ($ct > 0) {
	            $row2 = mysqli_fetch_assoc($quer);
	            $resFull = ucwords($row2['resFName'])." ".ucwords($row2['resMName'])." ".ucwords($row2['resLName']);
		?>
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<p class="parag1"><b>Complainant:</b></p>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
					<p class="parag2"><?php echo $resFull;?></p>
				</div>
			</div>
		<?php
			$qry = mysqli_query($con, "SELECT * FROM suspect WHERE sID = $sID");
			$ct = mysqli_num_rows($qry);
	        if ($ct > 0) {
	            $row3 = mysqli_fetch_assoc($qry);
	            $suspectName = ucwords($row3['fName'])." ".ucwords($row3['mName'])." ".ucwords($row3['lName']);
		?>
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<p class="parag1"><b>Respondent:</b></p>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
					<p class="parag2"><?php echo $suspectName;?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					<p class="parag1"><b>Narrative Report:</b></p>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8">
					<p class="parag2"><?php echo $details;?></p>
				</div>
			</div>
		<?php 	} }?>
		</div>
	</div>
</body>
</html>