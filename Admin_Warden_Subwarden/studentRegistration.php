<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<title>Student Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Student Registration </h2>
						<form method="post" action="" name="registration" class="form-horizontal">

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">

										<div class="panel-heading">Student Details</div>
										<div class="panel-body">

											<div class="form-group">
												<label class="col-sm-2 control-label"> Student ID : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_id" id="stu_id" class="form-control" required="required" disabled>
												</div>
												<button type="button" name="generate" id="generate" class="btn btn-primary"> Generate </button>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> First Name : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_fname" id="stu_fname" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Last Name : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_lname" id="stu_lname" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> NIC : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_nic" id="stu_nic" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Gender : </label>
												<div class="col-sm-8">
													<select name="stu_gender" id="stu_gender" class="form-control" required="required">
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Birth Date : </label>
												<div class="col-sm-8">
													<input type="date" name="stu_bdate" id="stu_bdate" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Contact No : </label>
												<div class="col-sm-8">
													<input type="tel" name="stu_contact" id="stu_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Address : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_address" id="stu_address" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Faculty : </label>
												<div class="col-sm-8">
													<select name="stu_faculty" id="stu_faculty" class="form-control" required="required">
														<option value="agriculture">Faculty of Agriculture</option>
														<option value="ahs">Faculty of Allied Health Sciences</option>
														<option value="arts">Faculty of Arts</option>
														<option value="dental">Faculty of Dental Sciences</option>
														<option value="engineering">Faculty of Engineering</option>
														<option value="management">Faculty of Management</option>
														<option value="medicine">Faculty of Medicine</option>
														<option value="science">Faculty of Science</option>
														<option value="vet">Faculty of Veterinary Medicine and Animal Science</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Batch : </label>
												<div class="col-sm-8">
													<select name="stu_batch" id="stu_batch" class="form-control" required="required">
														<option value="b20">20 Batch</option>
														<option value="b19">19 Batch</option>
														<option value="b18">18 Batch</option>
														<option value="b17">17 Batch</option>
														<option value="b16">16 Batch</option>
													</select>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">

										<div class="panel-heading">Hostel Details</div>
										<div class="panel-body">

											<div class="form-group">
												<label class="col-sm-2 control-label"> Hostel : </label>
												<div class="col-sm-8">
													<select name="stu_hostel" id="stu_hostel" class="form-control" required="required">
														<option value="arunachalam_hall">Arunachalam Hall</option>
														<option value="akbarnell_hall">Akbar Nell Hall</option>
														<option value="newakbar_hall">New Akbar Hall</option>
														<option value="marrs_hall">Marrs Hall</option>
														<option value="marcus_hall">Marcus Fernando Hall</option>
														<option value="jayathilake_hall">Jayathilake Hall</option>
														<option value="hindagala_hall">Hindagala Hall</option>
														<option value="jamesperis_hall">James Peris Hall</option>
														<option value="ivorjennings_hall">Ivor Jennings Hall</option>
														<option value="senakabibile_hall">Senaka Bibile Hall</option>
														<option value="ramanathan_hall">Ramanathan Hall</option>
														<option value="sangamitta_hall">Sangamitta Hall</option>
														<option value="hildaobeysekara_hall">Hilda Obeysekara Hall</option>
														<option value="wijewardana_hall">Wijewardana Hall</option>
														<option value="gunapalamalalasekara_hall">Gunapala Malalasekara</option>
														<option value="sarachchandra_hall">Ediriweera Sarachchandra</option>
														<option value="sarasavimadura_hall">Sarasavi Madura Hall</option>
														<option value="sarasaviuyana_hall">Sarasaviuyana Hall</option>
														<option value="wilegadara_hall">Wilagedara Bikku Hostel</option>
														<option value="kehelpannala_hall">Kehelpannala Bikku Hostel</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Room No : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_room_no" id="stu_room_no" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Check-In Date : </label>
												<div class="col-sm-8">
													<input type="date" name="stu_checkin" id="stu_checkin" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Check-Out Date : </label>
												<div class="col-sm-8">
													<input type="date" name="stu_checkout" id="stu_checkout" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Amount Paid : </label>
												<div class="col-sm-8">
													<input type="text" name="stu_amount" id="stu_amount" class="form-control" required="required">
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">

										<div class="panel-heading">Guardian Details</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="col-sm-2 control-label"> First Name : </label>
												<div class="col-sm-8">
													<input type="text" name="gur_fname" id="gur_fname" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Last Name : </label>
												<div class="col-sm-8">
													<input type="text" name="gur_lname" id="gur_lname" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> NIC : </label>
												<div class="col-sm-8">
													<input type="text" name="gur_nic" id="gur_nic" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Contact No : </label>
												<div class="col-sm-8">
													<input type="tel" name="gur_contact" id="gur_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Email : </label>
												<div class="col-sm-8">
													<input type="email" name="gur_email" id="gur_email" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Ocuupation : </label>
												<div class="col-sm-8">
													<input type="text" name="gur_ocuupation" id="gur_ocuupation" class="form-control" required="required">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label"> Relationship : </label>
												<div class="col-sm-8">
													<input type="text" name="gur_relationship" id="gur_relationship" class="form-control" required="required">
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-8 col-sm-offset-4">
								<input type="submit" id="submit" name="submit" Value="Register" class="btn btn-primary">
								<input type="reset" id="cancel" name="cancel" Value="Cancel" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</body>


</html>