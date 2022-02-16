<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <title>Staff Details</title>
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
                        <h2 class="page-title">Staff Member Details </h2>
                        <form method="post" action="" name="registration" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading">Personal Details</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> NIC : </label>
                                                <div class="col-sm-8">
                                                    <input type="search" name="emp_nic" id="emp_nic" class="form-control" required="required">
                                                </div>
                                                <button type="button" name="emp_search" id="emp_search" class="btn btn-primary"> Search </button>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Employee ID : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_id" id="emp_id" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> First Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_fname" id="emp_fname" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Last Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_lname" id="emp_lname" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Gender : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_gender" id="emp_gender" class="form-control" required="required">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Contact No : </label>
                                                <div class="col-sm-8">
                                                    <input type="tel" name="emp_contact" id="emp_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Address : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_address" id="emp_address" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Email : </label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="emp_email" id="emp_email" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Job Type : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_jobtype" id="emp_jobtype" class="form-control" required="required">
                                                        <option value="warden">Warden</option>
                                                        <option value="sub_warden">Sub Warden</option>
                                                        <option value="clerk">Clerk</option>
                                                        <option value="security">Security</option>
                                                        <option value="cleaner">Cleaner</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Hostel : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_hostel" id="emp_hostel" class="form-control" required="required">
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

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading">Warden / Sub Warden</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Faculty : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_faculty" id="emp_faculty" class="form-control" required="required">
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
                                                <label class="col-sm-2 control-label"> Start Date : </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="emp_startDate" id="emp_startDate" class="form-control" required="required">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Password: </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="emp_password" id="emp_password" class="form-control" required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Confirm Password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="emp_cpassword" id="emp_cpassword" class="form-control" required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-4">
                                <input type="submit" id="emp_update" name="emp_update" Value="Update" class="btn btn-primary">
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