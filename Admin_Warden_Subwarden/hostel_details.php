<?php
// session_start();
include('includes/config.php');
// include('includes/checklogin.php');
// check_login();

// if (isset($_GET['del'])) {
// 	$id = intval($_GET['del']);
// 	$adn = "delete from courses where id=?";
// 	$stmt = $mysqli->prepare($adn);
// 	$stmt->bind_param('i', $id);
// 	$stmt->execute();
// 	$stmt->close();
// 	echo "<script>alert('Data Deleted');</script>";
// }
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<title>Hostel Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
						<br>
						<h2 class="page-title">Hostel Details</h2>

						<div class="panel panel-primary">
							<div class="panel-heading">All Hostel Details</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table id="zctb" class="display table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Hostel ID</th>
												<th>Hostel Name</th>
												<th>Warden</th>
												<th>Sub Warden</th>
												<th>Number of Rooms</th>
												<th>Number of Students</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$aid = $_SESSION['id'];
											$ret = "select * from courses";
											$stmt = $mysqli->prepare($ret);
											//$stmt->bind_param('i',$aid);
											$stmt->execute(); //ok
											$res = $stmt->get_result();
											$cnt = 1;
											while ($row = $res->fetch_object()) {
											?>
												<tr>
													<td><?php echo $cnt;; ?></td>
													<td><?php echo $row->course_code; ?></td>
													<td><?php echo $row->course_sn; ?></td>
													<td><?php echo $row->course_fn; ?></td>
													<td><?php echo $row->posting_date; ?></td>
													<td>&nbsp;&nbsp;</td>
												</tr>
											<?php
												$cnt = $cnt + 1;
											} ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>