<?php require_once('includes/connection.php'); ?>

<?php
session_start();
if (isset($_POST['generate'])) {

    $query = "SELECT * FROM STAFF";
    $result_set = mysqli_query($conn, $query);

    while ($record = mysqli_fetch_assoc($result_set)) {
        $empID = $record['EmpID'];
    }

    $empID = "E" . str_pad(((int)(substr($empID, 1)) + 1), 3, '0', STR_PAD_LEFT);
}


if (isset($_POST['emp_register'])) {

    $empID = $_POST['emp_id'];
    $firstName = $_POST['emp_fname'];
    $lastName = $_POST['emp_lname'];
    $NIC = $_POST['emp_nic'];
    $gender = $_POST['emp_gender'];
    $contactNumber = $_POST['emp_contact'];
    $address = $_POST['emp_address'];
    $email = $_POST['emp_email'];
    $jobType = $_POST['emp_jobtype'];
    $hostel = $_POST['emp_hostel'];
    $workedHours = '';
    $faculty = $_POST['emp_faculty'];
    $startDate = $_POST['emp_startDate'];
    $password = $_POST['emp_password'];
    $confirm_password = $_POST['emp_cpassword'];


    $queryForHostel = "SELECT HostelID FROM HOSTEL WHERE HostelName = '{$hostel}'";
    $resultForHostel = mysqli_query($conn, $queryForHostel);
    if ($record = mysqli_fetch_assoc($resultForHostel)) {
        $hosteID = $record['HostelID'];
    } else {
        echo "<script> alert('No Such Hostel Exists !!'); </script>";
    }

    if ($jobType == "Warden" or $jobType == "Sub Warden") {
        if ($password == $confirm_password) {

            $query = "SELECT * FROM LOGIN";
            $result_set = mysqli_query($conn, $query);

            while ($record = mysqli_fetch_assoc($result_set)) {
                $loginID = $record['LoginID'];
            }

            $loginID = "L" . str_pad(((int)(substr($loginID, 1)) + 1), 3, '0', STR_PAD_LEFT);

            $query1 = "INSERT INTO STAFF VALUES (
				'{$empID}',
				'{$hosteID}', 
                '{$firstName}',
                '{$lastName}',
				'{$NIC}',
				'{$contactNumber}',
				'{$email}',
                '{$gender}',   
                '{$address}',
                '{$jobType}')";

            $query2 = "INSERT INTO WARDEN_SUBWARDEN VALUES (
				'{$empID}',
				'{$loginID}', 
                '{$faculty}',
                '{$startDate}')";

            $query3 = "INSERT INTO LOGIN VALUES (
                '{$loginID}',
                '{$email}', 
                '{$password}')";

            $result1 = mysqli_query($conn, $query1);
            $result3 = mysqli_query($conn, $query3);
            $result2 = mysqli_query($conn, $query2);

            if ($result1 and $result2 and $result3) {
                echo "<script> alert('Record Added Successfully'); </script>";
            } else {
                echo "<script> alert('Record Cannot be Added'); </script>";
            }
        } else {
            echo "<script> alert('Password doesn\'t match'); </script>";
        }
    } else {
        $query1 = "INSERT INTO STAFF VALUES (
                '{$empID}',
                '{$hosteID}', 
                '{$firstName}',
                '{$lastName}',
                '{$NIC}',
                '{$contactNumber}',
                '{$email}',
                '{$gender}',   
                '{$address}',
                '{$jobType}')";

        $query2 = "INSERT INTO MinorStaff VALUES (
                '{$empID}',
                '{$workedHours}')";

        $result1 = mysqli_query($conn, $query1);
        $result2 = mysqli_query($conn, $query2);

        if ($result1 and $result2) {
            echo "<script> alert('Record Added Successfully'); </script>";
        } else {
            echo "<script> alert('Record Cannot be Added'); </script>";
        }
    }
}
?>


<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <title>Staff Registration</title>
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

    <script>
        function changeStatus() {
            var status = document.getElementById("emp_jobtype").value;
            if (status == "Warden" || status == "Sub Warden") {
                document.getElementById("panel_warden_subwarden").removeAttribute("hidden");
            } else {
                document.getElementById("panel_warden_subwarden").hidden = "true";

            }
        }
    </script>

    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Staff Member Registration </h2>
                        <form method="post" action="staffRegistration.php" name="registration" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading">Personal Details</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Employee ID : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_id" id="emp_id" class="form-control" readonly value="<?php echo (isset($empID)) ? $empID : ''; ?>">
                                                </div>
                                                <button type="submit" name="generate" id="generate" class="btn btn-primary"> Generate </button>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> First Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_fname" id="emp_fname" class="form-control" value="<?php echo (isset($firstName)) ? $firstName : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Last Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_lname" id="emp_lname" class="form-control" value="<?php echo (isset($lastName)) ? $lastName : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> NIC : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_nic" id="emp_nic" class="form-control" value="<?php echo (isset($NIC)) ? $NIC : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Gender : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_gender" id="emp_gender" class="form-control">
                                                        <option value="Select Gender">Select Gender</option>
                                                        <option value="Male" <?php if (isset($gender) and $gender == "Male") echo ' selected="selected"' ?>>Male</option>
                                                        <option value="Female" <?php if (isset($gender) and $gender == "Female") echo ' selected="selected"' ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Contact No : </label>
                                                <div class="col-sm-8">
                                                    <input type="tel" name="emp_contact" id="emp_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" title="Format : 0XX-XXXXXXX" value="<?php echo (isset($contactNumber)) ? $contactNumber : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Address : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_address" id="emp_address" class="form-control" value="<?php echo (isset($address)) ? $address : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Email : </label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="emp_email" id="emp_email" class="form-control" value="<?php echo (isset($email)) ? $email : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Job Type : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_jobtype" id="emp_jobtype" class="form-control" onchange="changeStatus()">
                                                        <option value="Select Job Type">Select Job Type</option>
                                                        <option value="Warden" <?php if (isset($jobType) and $jobType == "Warden") echo ' selected="selected"' ?>>Warden</option>
                                                        <option value="Sub Warden" <?php if (isset($jobType) and $jobType == "Sub Warden") echo ' selected="selected"' ?>>Sub Warden</option>
                                                        <option value="Clerk" <?php if (isset($jobType) and $jobType == "Clerk") echo ' selected="selected"' ?>>Clerk</option>
                                                        <option value="Security" <?php if (isset($jobType) and $jobType == "Security") echo ' selected="selected"' ?>>Security</option>
                                                        <option value="Cleaner" <?php if (isset($jobType) and $jobType == "Cleaner") echo ' selected="selected"' ?>>Cleaner</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Hostel : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_hostel" id="emp_hostel" class="form-control">
                                                        <option value="Select Hostel">Select Hostel</option>
                                                        <option value="Arunachalam Hall" <?php if (isset($hostel) and $hostel == "Arunachalam Hall") echo ' selected="selected"' ?>>Arunachalam Hall</option>
                                                        <option value="Akbar Nell Hall" <?php if (isset($hostel) and $hostel == "Akbar Nell Hall") echo ' selected="selected"' ?>>Akbar Nell Hall</option>
                                                        <option value="New Akbar Hall" <?php if (isset($hostel) and $hostel == "New Akbar Hall") echo ' selected="selected"' ?>>New Akbar Hall</option>
                                                        <option value="Marrs Hall" <?php if (isset($hostel) and $hostel == "Marrs Hall") echo ' selected="selected"' ?>>Marrs Hall</option>
                                                        <option value="Marcus Fernando Hall" <?php if (isset($hostel) and $hostel == "Marcus Fernando Hall") echo ' selected="selected"' ?>>Marcus Fernando Hall</option>
                                                        <option value="Jayathilake Hall" <?php if (isset($hostel) and $hostel == "Jayathilake Hall") echo ' selected="selected"' ?>>Jayathilake Hall</option>
                                                        <option value="Hindagala Hall" <?php if (isset($hostel) and $hostel == "Hindagala Hall") echo ' selected="selected"' ?>>Hindagala Hall</option>
                                                        <option value="James Peris Hall" <?php if (isset($hostel) and $hostel == "James Peris Hall") echo ' selected="selected"' ?>>James Peris Hall</option>
                                                        <option value="Ivor Jennings Hall" <?php if (isset($hostel) and $hostel == "Ivor Jennings Hall") echo ' selected="selected"' ?>>Ivor Jennings Hall</option>
                                                        <option value="Senaka Bibile Hall" <?php if (isset($hostel) and $hostel == "Senaka Bibile Hall") echo ' selected="selected"' ?>>Senaka Bibile Hall</option>
                                                        <option value="Ramanathan Hall" <?php if (isset($hostel) and $hostel == "Ramanathan Hall") echo ' selected="selected"' ?>>Ramanathan Hall</option>
                                                        <option value="Sangamitta Hall" <?php if (isset($hostel) and $hostel == "Sangamitta Hall") echo ' selected="selected"' ?>>Sangamitta Hall</option>
                                                        <option value="Hilda Obeysekara Hall" <?php if (isset($hostel) and $hostel == "Hilda Obeysekara Hall") echo ' selected="selected"' ?>>Hilda Obeysekara Hall</option>
                                                        <option value="Wijewardana Hall" <?php if (isset($hostel) and $hostel == "Wijewardana Hall") echo ' selected="selected"' ?>>Wijewardana Hall</option>
                                                        <option value="Gunapala Malalasekara" <?php if (isset($hostel) and $hostel == "Gunapala Malalasekara") echo ' selected="selected"' ?>>Gunapala Malalasekara</option>
                                                        <option value="Ediriweera Sarachchandra" <?php if (isset($hostel) and $hostel == "Ediriweera Sarachchandra") echo ' selected="selected"' ?>>Ediriweera Sarachchandra</option>
                                                        <option value="Sarasavi Madura Hall" <?php if (isset($hostel) and $hostel == "Sarasavi Madura Hall") echo ' selected="selected"' ?>>Sarasavi Madura Hall</option>
                                                        <option value="Sarasaviuyana Hall" <?php if (isset($hostel) and $hostel == "Sarasaviuyana Hall") echo ' selected="selected"' ?>>Sarasaviuyana Hall</option>
                                                        <option value="Wilagedara Bikku Hostel" <?php if (isset($hostel) and $hostel == "Wilagedara Bikku Hostel") echo ' selected="selected"' ?>>Wilagedara Bikku Hostel</option>
                                                        <option value="Kehelpannala Bikku Hostel" <?php if (isset($hostel) and $hostel == "Kehelpannala Bikku Hostel") echo ' selected="selected"' ?>>Kehelpannala Bikku Hostel</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" id="panel_warden_subwarden" hidden>

                                        <div class="panel-heading">Warden / Sub Warden</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Faculty : </label>
                                                <div class="col-sm-8">
                                                    <select name="emp_faculty" id="emp_faculty" class="form-control">
                                                        <option value="Select Faculty">Select Faculty</option>
                                                        <option value="Faculty of Agriculture" <?php if (isset($faculty) and $faculty == "Faculty of Agriculture") echo ' selected="selected"' ?>>Faculty of Agriculture</option>
                                                        <option value="Faculty of Allied Health Sciences" <?php if (isset($faculty) and $faculty == "Faculty of Allied Health Sciences") echo ' selected="selected"' ?>>Faculty of Allied Health Sciences</option>
                                                        <option value="Faculty of Arts" <?php if (isset($faculty) and $faculty == "Faculty of Arts") echo ' selected="selected"' ?>>Faculty of Arts</option>
                                                        <option value="Faculty of Dental Sciences" <?php if (isset($faculty) and $faculty == "Faculty of Dental Sciences") echo ' selected="selected"' ?>>Faculty of Dental Sciences</option>
                                                        <option value="Faculty of Engineering" <?php if (isset($faculty) and $faculty == "Faculty of Engineering") echo ' selected="selected"' ?>>Faculty of Engineering</option>
                                                        <option value="Faculty of Management" <?php if (isset($faculty) and $faculty == "Faculty of Management") echo ' selected="selected"' ?>>Faculty of Management</option>
                                                        <option value="Faculty of Medicine" <?php if (isset($faculty) and $faculty == "Faculty of Medicine") echo ' selected="selected"' ?>>Faculty of Medicine</option>
                                                        <option value="Faculty of Science" <?php if (isset($faculty) and $faculty == "Faculty of Science") echo ' selected="selected"' ?>>Faculty of Science</option>
                                                        <option value="Faculty of Veterinary Medicine and Animal Science" <?php if (isset($faculty) and $faculty == "Faculty of Veterinary Medicine and Animal Science") echo ' selected="selected"' ?>>Faculty of Veterinary Medicine and Animal Science</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Start Date : </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="emp_startDate" id="emp_startDate" class="form-control" value="<?php echo (isset($startDate)) ? $startDate : ''; ?>">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Password: </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="emp_password" id="emp_password" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Confirm Password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="emp_cpassword" id="emp_cpassword" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-4">
                                <input type="submit" id="emp_register" name="emp_register" Value="Register" class="btn btn-primary">
                                <input type="submit" id="emp_cancel" name="emp_cancel" Value="Cancel" class="btn btn-primary">
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