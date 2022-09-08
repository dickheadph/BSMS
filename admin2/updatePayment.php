<?php
	include '../connection.php';

	if (isset($_POST['update'])) {
		$payID = $_POST['payID'];
		$type = $_POST['type'];
		$payer = $_POST['payer'];
		$orNum = $_POST['orNum'];
		$amount = $_POST['amount'];

		$name = $_FILES['file']['name'];
		$target_dir = "../receipt/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		
		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");
		
		// Check extension
		if( in_array($imageFileType,$extensions_arr) ){
			// Upload file
			if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
				// Insert record
				$sql = mysqli_query($con, "UPDATE payment SET orNum = '$orNum', receipt = '".$name."' WHERE payID = '$payID'");
				if ($sql == true) {
					echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Updated successfully!',
							                    icon: 'success',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			});</script>";
					echo "<script>window.location.href='payment.php?adminID=$_SESSION[adminID]'</script>";
				}
			}
		}else{
			$sql = mysqli_query($con, "UPDATE payment SET orNum = '$orNum' WHERE payID = '$payID'");
			if ($sql == true) {
				echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Updated successfully!',
							                    icon: 'success',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			});</script>";
				echo "<script>window.location.href='payment.php?adminID=$_SESSION[adminID]'</script>";
			}
		}
	}
?>