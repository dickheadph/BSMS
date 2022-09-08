<?php
	if(isset($_POST['add'])){
		$resFName = $_POST['resFName'];
		$resMName = $_POST['resMName'];
		$resLName = $_POST['resLName'];
		$resSex = $_POST['resSex'];
		$resNum = $_POST['resNum'];
		$resBday = $_POST['resBday'];
		$resStatus = $_POST['resStatus'];
		$resHouseNum = $_POST['resHouseNum'];
		$resZone = $_POST['resZone'];

		$today = date("Y-m-d");
		$diff = date_diff(date_create($resBday), date_create($today));
		$age = $diff->format('%y');

		$sql = mysqli_query($con, "INSERT INTO resident(resFName, resMName, resLName, resSex, resNum, resAge, resBday, resStatus, resHouseNum, resZone) VALUES('$resFName', '$resMName', '$resLName', '$resSex', '$resNum', '$age', '$resBday', '$resStatus', '$resHouseNum', '$resZone')");
		if ($sql == true) {
			echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Added successfully!',
							                    icon: 'success',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			}).then(function() {
											    window.location = 'list.php?adminID=$_SESSION[adminID]';
											});</script>";
		}
	}
?>

<div class="modal fade" id="add_data_Modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<h3 class="modal-title">Add Resident</h3>
				</div>
				<div class="modal-body" style="color: white">
					<div class="row">
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">First Name:</label>
							<div class="form-group">
								<input type="text" class="form-control col-xs-4" name="resFName" required>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">Middle Name:</label>
							<div class="form-group">
								<input type="text" class="form-control col-xs-4" placeholder="Optional" name="resMName">
							</div>
						</div>
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">Last Name:</label>
							<div class="form-group">
								<input type="text" class="form-control col-xs-4" name="resLName" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<i class="fa fa-globe"></i> <label class="control-label">Civil Status:</label>
							<div class="form-group">
								<select name="resStatus" class="form-control" required>
									<option value="">--</option>
									<option value="DIVORCED">DIVORCED</option>
									<option value="MARRIED">MARRIED</option>
									<option value="SINGLE">SINGLE</option>
									<option value="WIDOWED">WIDOWED</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-transgender"></i> <label class="control-label">Sex:</label>
							<div class="form-group">
								<select name="resSex" class="form-control" required>
									<option value="">--</option>
									<option value="FEMALE">FEMALE</option>
									<option value="MALE">MALE</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-home"></i> <label class="control-label">Zone:</label>
							<div class="form-group">
								<select name="resZone" class="form-control" required>
									<option value="">--</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-home"></i> <label class="control-label">House No:</label>
							<div class="form-group">
								<input type="number" class="form-control" name="resHouseNum" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<i class="fa fa-calendar"></i> <label class="control-label">Birthdate:</label>
							<div class="form-group">
								<input type="date" class="form-control" name="resBday" required>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-phone"></i> <label class="control-label">Mobile Number:</label>
							<div class="form-group">
								<input type="number" class="form-control" name="resNum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="add" class="btn" style="background-color: #f8a698"><span class="fa fa-plus"></span> Add</button>
					<button class="btn" type="button" data-dismiss="modal" style="background-color: #f8a698"><span class="fa fa-remove"></span> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>