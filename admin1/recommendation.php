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
		.headerr{
			text-align: center;
			font-size: 25px;
		}
		.cert{
			text-align: center;
			font-size: 25px;
			margin-top: 5%;
		}
		.name{
			word-spacing: 0px;
			margin-top: 16%;
			font-size: 23px;
		}
		.parag{
			text-align: justify;
		}
	</style>
</head>
<body onload="window.print()">
	<div class="container content2">
		<img src="../dist/images/logo.png" width="20%" style="margin-left: auto; float: left;">
		<img src="../dist/images/nabua.jpg" width="20%" style="margin-right: auto; float: right;">
		<p class="headerr">Republic of the Philippines <br>
			Province of Camarines Sur <br>
			MUNICIPALITY OF NABUA <br>
			<b>BARANGAY STA. ELENA BARAS</b> <br>
			-o0o- <br>
			OFFICE OF THE PUNONG BARANGAY
		</p>
		<img src="../dist/images/line2.png" width="100%">
		<img src="../dist/images/line.png" width="100%">
		<h2 class="cert"><b>RECOMMENDATION</b></h2>
		<br> <br>
		<p style="font-weight: bold;"><?php echo date('F j, Y');?></p>

		<p style="font-weight: bold;">
			HON. FERNANDO D. SIMBULAN <br>
			Municipal Mayor <br>
			Nabua, Camarines Sur
		</p>
		<br>
		<p style="font-weight: bold;">Dear Mayor Simbulan,</p>
		<?php 
			$requestID = $_GET['requestID'];
			$query = mysqli_query($con, "SELECT * FROM request WHERE requestID = $requestID");
			$count = mysqli_num_rows($query);
	        if ($count > 0) {
	            $row = mysqli_fetch_assoc($query);
	            $resID = $row['resID'];
	            $purpose = $row['purpose'];
	            $dDate = $row['dDate'];
	        }
			$quer = mysqli_query($con, "SELECT * FROM resident WHERE resID = $resID");
			$ct = mysqli_num_rows($quer);
	        if ($ct > 0) {
	            $row = mysqli_fetch_assoc($quer);
	            $resFName = $row['resFName'];
	            $resMName = $row['resMName'];
	            $resLName = $row['resLName'];
	            $resZone = $row['resZone'];
	            $resStatus = $row['resStatus'];
	            $resAge = $row['resAge'];

	            $resFull = strtoupper($resFName)." ".strtoupper($resMName)." ".strtoupper($resLName);
		?>
		<p class="parag"> 
			May I have the honor to recommend in your good office <b> <?php echo strtoupper($resFull)?> </b>, <?php echo $resAge;?> years old, <?php echo strtolower($resStatus);?>, resident of Zone <?php echo $resZone;?>, Sta. Elena, Baras, Nabua Camarines Sur, belong to the indigent family in the community.
		</p>
		<p class="parag"> 
			This certification is being issued upon the request for above-named person for the purpose of <b> <?php echo $purpose;?> </b>. 
		</p>
		<p class="parag">
			The above-said person belong to the indigent family in the community with no permanent source of income.
		</p>

		<p class="parag">Trusting that this recommendation meets your positive and favorable response.</p>

		<p class="parag">Thank you very much.</p>

		<p style="font-weight: bold;">Respectfully yours,</p>

		<p class="name"><b> 
			HON. HERMIE C. SAMUDIO SR. <br> Punong Barangay
		</b></p>

		<?php
			}
		?>
	</div>
</body>
</html>