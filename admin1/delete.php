<?php
	include '../connection.php';

	if (isset($_POST['delete'])) {
		$resID = $_POST['resID'];

		$sql = mysqli_query($con, "DELETE FROM resident WHERE resID='$resID'");
		if($sql==true){
			echo "<script>window.location.href='list.php?adminID=$_SESSION[adminID]'</script>";
		}
	}

	if (isset($_POST['deleteBlotter'])) {
		$bID = $_POST['bID'];

		$sql = mysqli_query($con, "DELETE FROM blotter WHERE bID='$bID'");
		if($sql==true){
			echo "<script>window.location.href='blotter.php?adminID=$_SESSION[adminID]'</script>";
		}
	}
?>