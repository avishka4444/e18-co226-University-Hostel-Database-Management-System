<!-- <?php
        // session_start();
        // include('includes/config.php');
        // include('includes/checklogin.php');
        // check_login();

        // if (isset($_GET['del'])) {
        //     $id = intval($_GET['del']);
        //     $adn = "delete from courses where id=?";
        //     $stmt = $mysqli->prepare($adn);
        //     $stmt->bind_param('i', $id);
        //     $stmt->execute();
        //     $stmt->close();
        //     echo "<script>alert('Data Deleted');</script>";
        // }
        ?> -->
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <title>Available Rooms</title>
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
                        <h2 class="page-title">Available Room Details</h2>

                        <form method="post" action="" name="registration" class="form-horizontal">
                            <div class="panel panel-default panel-details">
                                <div class="panel-body" align="center">
                                    <div class="form-group">
                                        <label class=" col-sm-2 control-label select-label"> Select Hostel : </label>
                                        <div class="col-sm-4">
                                            <select name="select_hostel" id="select_hostel" class="form-control" required="required">
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
                                        <div class="col-sm-1">
                                            <button type="button" name="room_search" id="room_search" class="btn btn-primary"> Show Details </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="panel panel-primary">
                            <div class="panel-heading">All Available Rooms Details</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="zctb" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Room ID</th>
                                                <th>Room Number</th>
                                                <th>Capacity</th>
                                                <th>Assigned Students</th>
                                                <th></th>
                                                <th></th>

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