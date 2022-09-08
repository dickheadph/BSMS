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
		.parag{
			text-align: justify;
		}
		.footer{
			font-style: italic;
			font-family: Arial;
			margin-top: 34%;
		}
		.btn{
			float: right;
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
		<div class="row">
			<div class="coll1 col-sm-4 col-md-4 col-lg-4">
				<h5><b>OFFICIARY</b></h5>
				<p><b>Hon. Hermie C. Samudio Sr.</b> <br>
					Punong Barangay </p> <br>
				<p><b>Hon. Louie A. Cabal</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Jeddah A. Regalado</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Glenn B. Guadalupe</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Leni L. Estoque</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Gracelyn A. Estoy</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Ronnie P. Salas</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. Noel R. Nueva</b> <br>
					Barangay Kagawad </p> <br>
				<p><b>Hon. James C. Castro</b> <br>
					SK Kagawad </p> <br>
				<p><b>Ms. April B. Regalado</b> <br>
					Barangay Secretary </p> <br>
				<p><b>Mrs. Girly N. Iyana</b> <br>
					Barangay Treasurer </p> <br>
			</div>
			<div class="coll2 col-sm-1 col-md-1 col-lg-1">
				<img src="../dist/images/line3.png" width="15%">
			</div>
			<div class="coll3 col-sm-7 col-md-7 col-lg-7">
				<h2 class="cert"><u><b> CERTIFICATE OF RESIDENCY </b></u></h2>
				<br> <br> <br>
				<h5><b> TO WHOM IT MAY CONCERN: </b></h5>
				<br> <br> <br>
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

			            $resFull = strtoupper($resFName)." ".strtoupper($resMName)." ".strtoupper($resLName);
				?>
				<p class="parag"> 
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This is to certify that <u><b> <?php echo strtoupper($resFull)?> </b></u>, of legal age, <?php echo strtolower($resStatus);?>, Filipino, is a PERMANENT RESIDENT of this Barangay Sta. Elena, Baras, Nabua Camarines Sur.
				</p>
				<p class="parag"> 
					&nbsp&nbsp&nbsp&nbsp&nbsp Based on records of this office, she has been residing at barangay Sta. Elena, Baras, Nabua Camarines Sur. 
				</p>
				<p class="parag"> 
					&nbsp&nbsp&nbsp&nbsp&nbsp This certification is being issued upon the request for above-named person for the purpose it may serve. 
				</p>
				<p class="parag">
					&nbsp&nbsp&nbsp&nbsp&nbsp Issued this <u><b> <?php echo date('F j, Y',strtotime($dDate));?> </b></u> at Barangay Sta. Elena, Baras, Nabua Camarines Sur, Philippines.
				</p>

				<p class="name"><b> HON. HERMIE C. SAMUDIO SR. </b></p>
				<p class="designation"> Punong Barangay </p>

				<?php
					}
				?>
				<div class="footer">
					<p>This barangay Certificate is valid for three (3) months only upon date of issuance.
						<br> Not valid without Seal.
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>