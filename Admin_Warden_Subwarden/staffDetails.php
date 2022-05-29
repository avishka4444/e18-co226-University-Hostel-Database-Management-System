<?php require_once('includes/connection.php'); ?>

<?php
session_start();
if (isset($_POST['emp_search'])) {

    $NIC = $_POST['emp_nic'];

    $query = "SELECT * from STAFF,HOSTEL WHERE Staff.HostelID = Hostel.HostelID AND Emp_NIC = '{$NIC}' ";

    $resultRow = mysqli_query($conn, $query);

    if ($record = mysqli_fetch_assoc($resultRow)) {

        $empID = $record['EmpID'];
        $firstName = $record['Emp_FName'];
        $lastName = $record['Emp_LName'];
        $gender = $record['Emp_Gender'];
        $contactNumber = $record['Emp_TelNum'];
        $address = $record['Emp_Address'];
        $email = $record['Emp_Email'];
        $jobType = $record['Emp_JobType'];
        $hostel = $record['HostelName'];

        if ($jobType == "Warden" or $jobType == "Sub Warden") {
            $query_For_Warden_SubWarden = "SELECT * FROM Warden_SubWarden, Login WHERE Warden_SubWarden.LoginID = Login.LoginID AND EmpID = '{$empID}'";
            $resultRow = mysqli_query($conn, $query_For_Warden_SubWarden);
            if ($record = mysqli_fetch_assoc($resultRow)) {
                $faculty = $record['Faculty'];
                $startDate = $record['StartDate'];
                $password = $record['Password'];
            }
        } else {
            $query_For_Minor_Staff = "SELECT * FROM MinorStaff WHERE EmpID = '{$empID}'";
            $resultRow = mysqli_query($conn, $query_For_Minor_Staff);
            if ($record = mysqli_fetch_assoc($resultRow)) {
                $workedHours = $record['WorkedHours'];
            }
        }
    } else {
        echo "<script> alert('No Such Staff Member Exists !!'); </script>";
    }
}

if (isset($_POST['emp_update'])) {

    $NIC = $_POST['emp_nic'];
    $empID = $_POST['emp_id'];
    $firstName = $_POST['emp_fname'];
    $lastName = $_POST['emp_lname'];
    $gender = $_POST['emp_gender'];
    $contactNumber = $_POST['emp_contact'];
    $address = $_POST['emp_address'];
    $email = $_POST['emp_email'];
    $jobType = $_POST['emp_jobtype'];
    $hostel = $_POST['emp_hostel'];
    $workedHours = $_POST['emp_worked_hours'];
    $faculty = $_POST['emp_faculty'];
    $startDate = $_POST['emp_startDate'];
    $password = $_POST['emp_password'];
    $new_password = $_POST['emp_npassword'];
    $confirm_password = $_POST['emp_cpassword'];


    $queryForHostel = "SELECT HostelID FROM HOSTEL WHERE HostelName = '{$hostel}'";
    $resultForHostel = mysqli_query($conn, $queryForHostel);
    if ($record = mysqli_fetch_assoc($resultForHostel)) {
        $hosteID = $record['HostelID'];
    } else {
        echo "<script> alert('No Such Hostel Exists !!'); </script>";
    }

    if ($jobType == "Warden" or $jobType == "Sub Warden") {
        if ($new_password == $confirm_password) {

            $password = $new_password;

            $query_For_Warden_SubWarden = "UPDATE Warden_SubWarden, Login  SET 
                Faculty = '{$faculty}',
                StartDate = '{$startDate}',
                UserName = '{$email}',
                Password = '{$new_password}'
                WHERE Warden_SubWarden.LoginID = Login.LoginID AND EmpID = '{$empID}' ";

            $result_For_Warden_SubWarden = mysqli_query($conn, $query_For_Warden_SubWarden);
            if ($result_For_Warden_SubWarden) {
                $query = "UPDATE Staff SET 
                    Emp_NIC = '{$NIC}',
                    Emp_FName = '{$firstName}',
                    Emp_LName = '{$lastName}',
                    Emp_Gender = '{$gender}',
                    Emp_TelNum = '{$contactNumber}',
                    Emp_Address = '{$address}',
                    Emp_Email = '{$email}',
                    Emp_JobType = '{$jobType}',
                    HostelID = '{$hosteID}'
                    WHERE EmpID = '{$empID}' ";

                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script> alert('Record Updated Successfully'); </script>";
                } else {
                    echo "<script> alert('Record Cannot Update'); </script>";
                }
            } else {
                echo "<script> alert('Something Wrong'); </script>";
            }
        } else {
            echo "<script> alert('Password doesn\'t match'); </script>";
        }
    } else {
        $query_For_Minor_Staff = "UPDATE MinorStaff SET 
            WorkedHours = '{$workedHours}'
            WHERE EmpID = '{$empID}' ";

        $result_For_Minor_Staff = mysqli_query($conn, $query_For_Minor_Staff);
        if ($result_For_Minor_Staff) {
            $query = "UPDATE Staff SET 
                Emp_NIC = '{$NIC}',
                Emp_FName = '{$firstName}',
                Emp_LName = '{$lastName}',
                Emp_Gender = '{$gender}',
                Emp_TelNum = '{$contactNumber}',
                Emp_Address = '{$address}',
                Emp_Email = '{$email}',
                Emp_JobType = '{$jobType}',
                HostelID = '{$hosteID}'
                WHERE EmpID = '{$empID}' ";

            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script> alert('Record Updated Successfully'); </script>";
            } else {
                echo "<script> alert('Record Cannot Update'); </script>";
            }
        } else {
            echo "<script> alert('Something Wrong'); </script>";
        }
    }
}

if (isset($_POST['emp_delete'])) {
    $empID = $_POST['emp_id'];
    $jobType = $_POST['emp_jobtype'];

    if ($jobType == "Warden" or $jobType == "Sub Warden") {
        $query = "SELECT LoginID FROM Warden_SubWarden WHERE EmpID = '{$empID}'";
        $result = mysqli_query($conn, $query);
        if ($record = mysqli_fetch_assoc($result)) {
            $loginID = $record['LoginID'];

            $query1 = "DELETE FROM STAFF WHERE EmpID = '{$empID}'";
            $query2 = "DELETE FROM LOGIN WHERE LoginID = '{$loginID}'";

            $result1 = mysqli_query($conn, $query1);
            $result2 = mysqli_query($conn, $query2);
            if ($result1 and $result2) {
                $empID = '';
                $jobType = '';
                echo "<script> alert('Record Deleted Successfully'); </script>";
            } else {
                echo "<script> alert('Record Cannot Delete'); </script>";
            }
        } else {
            echo "<script> alert('No Such LoginID Exists !!'); </script>";
        }
    } else {
        $query1 = "DELETE FROM STAFF WHERE EmpID = '{$empID}'";
        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            $empID = '';
            $jobType = '';
            echo "<script> alert('Record Deleted Successfully'); </script>";
        } else {
            echo "<script> alert('Record Cannot Delete'); </script>";
        }
    }
}

?>


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
                        <form method="post" action="staffDetails.php" name="registration" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading">Personal Details</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> NIC : </label>
                                                <div class="col-sm-8">
                                                    <input type="search" name="emp_nic" id="emp_nic" class="form-control" required="required" value="<?php echo (isset($NIC)) ? $NIC : ''; ?>">
                                                </div>
                                                <button type="submit" name="emp_search" id="emp_search" class="btn btn-primary"> Search </button>
                                                <button type="submit" name="emp_clear" id="emp_clear" class="btn btn-primary"> Clear </button>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Employee ID : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_id" id="emp_id" class="form-control" readonly="true" value="<?php echo (isset($empID)) ? $empID : ''; ?>">
                                                </div>
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
                                                    <input type="tel" name="emp_contact" id="emp_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" value="<?php echo (isset($contactNumber)) ? $contactNumber : ''; ?>">
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
                                                    <select name="emp_jobtype" id="emp_jobtype" class="form-control">
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

                                            <div class="form-group" <?php if (isset($jobType) and ($jobType == "Warden" or $jobType == "Sub Warden")) echo 'hidden' ?>>
                                                <label class="col-sm-2 control-label"> Worked Hours : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="emp_worked_hours" id="emp_worked_hours" class="form-control" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="<?php echo (isset($workedHours)) ? $workedHours : ''; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary" <?php if (!isset($jobType) or ($jobType != "Warden" and $jobType != "Sub Warden")) echo 'hidden="true"' ?>>

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
                                                    <input type="text" name="emp_password" id="emp_password" class="form-control" readonly value="<?php echo (isset($password)) ? $password : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">New Password: </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="emp_npassword" id="emp_npassword" class="form-control">
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
                                <input type="submit" id="emp_update" name="emp_update" Value="Update" class="btn btn-primary">
                                <button type="submit" name="emp_delete" id="emp_delete" class="btn btn-primary"> Delete </button>
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