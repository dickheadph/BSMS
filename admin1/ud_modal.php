<!-- Update Modal-->
<?php
	if(isset($_POST['update'])){
		$resID = $_POST['resID'];
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
		
		$sql = mysqli_query($con, "UPDATE resident SET resFName='$resFName', resMName='$resMName', resLName='$resLName', resSex='$resSex', resNum='$resNum', resAge='$age', resBday='$resBday', resStatus='$resStatus', resHouseNum='$resHouseNum', resZone='$resZone' WHERE resID='$resID'");
		if($sql===true){
			echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Updated successfully!',
							                    icon: 'success',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			}).then(function() {
											    window.location = 'list.php?adminID=$_SESSION[adminID]';
											});</script>";
		}else{
			echo "<script type='text/javascript'>Swal.fire({
							                    title: 'Updated not successful!',
							                    icon: 'error',
							                    showConfirmButton: true,
												showCancelButton: false,
							                    timer: 3000
			                    			}).then(function() {
											    window.location = 'list.php?adminID=$_SESSION[adminID]';
											});</script>";
		}
	}
?>
<div class="modal fade" id="update_modal<?php echo $fetch['resID'] ?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<h3 class="modal-title">Update Resident</h3>
				</div>
				<div class="modal-body" style="color: white">
					<div class="row">
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">First Name:</label>
							<div class="form-group">
								<input type="hidden" name="resID" value="<?php echo $fetch['resID']?>">
								<input type="hidden" name="resNum" value="<?php echo $fetch['resNum']?>">
								<input type="text" class="form-control col-xs-4" name="resFName" value="<?php echo ucwords($fetch['resFName'])?>" required>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">Middle Name:</label>
							<div class="form-group">
								<input type="text" class="form-control col-xs-4" placeholder="Optional" name="resMName" value="<?php echo ucwords($fetch['resMName'])?>">
							</div>
						</div>
						<div class="col">
							<i class="fa fa-user-circle"></i> <label class="control-label">Last Name:</label>
							<div class="form-group">
								<input type="text" class="form-control col-xs-4" name="resLName" value="<?php echo ucwords($fetch['resLName'])?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<i class="fa fa-globe"></i> <label class="control-label">Civil Status:</label>
							<div class="form-group">
								<select name="resStatus" class="form-control" required>
									<option value="DIVORCED" <?php echo $fetch['resStatus']=="DIVORCED"?"selected":""; ?> >DIVORCED</option>
									<option value="MARRIED" <?php echo $fetch['resStatus']=="MARRIED"?"selected":""; ?> >MARRIED</option>
									<option value="SINGLE" <?php echo $fetch['resStatus']=="SINGLE"?"selected":""; ?> >SINGLE</option>
									<option value="WIDOWED" <?php echo $fetch['resStatus']=="WIDOWED"?"selected":""; ?> >WIDOWED</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-transgender"></i> <label class="control-label">Sex:</label>
							<div class="form-group">
								<select name="resSex" class="form-control" required>
									<option value="FEMALE" <?php echo $fetch['resSex']=="FEMALE"?"selected":""; ?> >FEMALE</option>
									<option value="MALE" <?php echo $fetch['resSex']=="MALE"?"selected":""; ?> >MALE</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-home"></i> <label class="control-label">Zone:</label>
							<div class="form-group">
								<select name="resZone" class="form-control" required>
									<option value="1" <?php echo $fetch['resZone']==1?"selected":""; ?> >1</option>
									<option value="2" <?php echo $fetch['resZone']==2?"selected":""; ?> >2</option>
									<option value="3" <?php echo $fetch['resZone']==3?"selected":""; ?> >3</option>
									<option value="4" <?php echo $fetch['resZone']==4?"selected":""; ?> >4</option>
									<option value="5" <?php echo $fetch['resZone']==5?"selected":""; ?> >5</option>
									<option value="6" <?php echo $fetch['resZone']==6?"selected":""; ?> >6</option>
									<option value="7" <?php echo $fetch['resZone']==7?"selected":""; ?> >7</option>
								</select>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-home"></i> <label class="control-label">House No:</label>
							<div class="form-group">
								<input type="number" class="form-control" name="resHouseNum" value="<?php echo($fetch['resHouseNum'])?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<i class="fa fa-calendar"></i> <label class="control-label">Birthdate:</label>
							<div class="form-group">
								<input type="date" class="form-control" name="resBday" value="<?php echo($fetch['resBday'])?>" required>
							</div>
						</div>
						<div class="col">
							<i class="fa fa-phone"></i> <label class="control-label">Mobile Number:</label>
							<div class="form-group">
								<input type="number" class="form-control" name="resNum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" value="<?php echo($fetch['resNum'])?>" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button name="update" class="btn" style="background-color: #f8a698"><span class="fa fa-edit"></span> Update</button>
					<button class="btn" type="button" data-dismiss="modal" style="background-color: #f8a698"><span class="fa fa-remove"></span> Close</button>
				</div>
			</form>
		</div>
	</div>
</div> 
<!-- End of Update Modal-->