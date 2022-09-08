<?php
	include '../connection.php';

	$phoneNumber = "";
	
	if (isset($_POST['done'])) {
		$requestID = $_POST['requestID'];
		$phoneNumber = $_POST['resNum'];

		$sql = mysqli_query($con, "UPDATE request SET status='COMPLETED' WHERE requestID='$requestID'");
		if($sql===true){
			$q = mysqli_query($con, "SELECT * FROM resident WHERE resNum='$phoneNumber'");
			if (mysqli_num_rows($q)>0) {
				while ($row = mysqli_fetch_assoc($q)) {
					if ($phoneNumber == $row['resNum']) {
						//##########################################################################
						// ITEXMO SEND SMS API - PHP - CURL METHOD
						// Visit www.itexmo.com/developers.php for more info about this API
						//##########################################################################
						function itexmo($phoneNumber,$message,$apicode,$passwd){
							$ch = curl_init();
							$itexmo = array('1' => $phoneNumber, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
							curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, 
							          http_build_query($itexmo));
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							return curl_exec ($ch);
							curl_close ($ch);
						}
						//##########################################################################

						$apicode = "TR-FRANZ070463_D4J12";
						$password = "a!v#ae96tp";

						$full = ucwords($row['resFName'])." ".ucwords($row['resLName']);

						$message = "We received your payment and your request is already released to you.";

						$result = itexmo($phoneNumber,$message,$apicode,$password);
						if ($result == ""){
							echo "iTexMo: No response from server!!!
							Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
							Please CONTACT US for help. ";
						}else if ($result == 0){
							echo "<script>window.location.href='docComplete.php?adminID=$_SESSION[adminID]'</script>";
						}else{	
							echo "Error Num ". $result . " was encountered!";
						}
					}
				}
			}else{
				echo "<script type='text/javascript'>Swal.fire({
						                    title: 'Number doesn't exist!',
						                    icon: 'success',
						                    showConfirmButton: true,
											showCancelButton: false,
						                    timer: 3000
		                    			}).then(function() {
										    window.location = 'list.php?adminID=$_SESSION[adminID]';
										});</script>";
			}
		}
	}
?>