<?php require_once('includes/connection.php'); ?>

<?php
session_start();
if (isset($_POST['stu_search'])) {

    $NIC = $_POST['stu_nic'];

    $query = "SELECT * from student,room, hostel, guardian where student.RoomID = room.RoomID and room.HostelID = hostel.HostelID and student.StudentID = guardian.StudentID and Stu_NIC = '{$NIC}' ";

    $resultRow = mysqli_query($conn, $query);

    if ($record = mysqli_fetch_assoc($resultRow)) {

        $studentID = $record['StudentID'];
        $firstName = $record['Stu_FName'];
        $lastName = $record['Stu_LName'];
        $gender = $record['Stu_Gender'];
        $bDate = $record['Stu_BirthDate'];
        $contactNumber = $record['Stu_PhoneNum'];
        $address = $record['Stu_Address'];
        $faculty = $record['Stu_Faculty'];
        $batch = $record['Stu_Batch'];
        $hostel = $record['HostelName'];
        $roomNum = $record['RoomNo'];
        $check_in_date = $record['CheckInDate'];
        $check_out_date = $record['CheckOutDate'];
        $amountPaid = $record['AmountPaid'];
        $guar_fname = $record['Guar_FName'];
        $guar_lname = $record['Guar_LName'];
        $guar_nic = $record['Guar_NIC'];
        $guar_telnum = $record['Guar_TelNum'];
        $guar_email = $record['Guar_Email'];
        $guar_occupation = $record['Occupation'];
        $guar_relationship = $record['Relationship'];
    } else {
        echo "<script> alert('No Such Student Exists !!'); </script>";
    }
}

if (isset($_POST['stu_update'])) {
    $NIC = $_POST['stu_nic'];
    $studentID = $_POST['stu_id'];
    $firstName = $_POST['stu_fname'];
    $lastName = $_POST['stu_lname'];
    $gender = $_POST['stu_gender'];
    $bDate = $_POST['stu_bdate'];
    $contactNumber = $_POST['stu_contact'];
    $address = $_POST['stu_address'];
    $faculty = $_POST['stu_faculty'];
    $batch = $_POST['stu_batch'];
    $hostel = $_POST['stu_hostel'];
    $roomNum = $_POST['stu_room_no'];
    $check_in_date = $_POST['stu_checkin'];
    $check_out_date = $_POST['stu_checkout'];
    $amountPaid = $_POST['stu_amount'];
    $guar_fname = $_POST['gur_fname'];
    $guar_lname = $_POST['gur_lname'];
    $guar_nic = $_POST['gur_nic'];
    $guar_telnum = $_POST['gur_contact'];
    $guar_email = $_POST['gur_email'];
    $guar_occupation = $_POST['gur_ocuupation'];
    $guar_relationship = $_POST['gur_relationship'];


    $queryForHostel = "SELECT HostelID FROM HOSTEL WHERE HostelName = '{$hostel}'";
    $resultForHostel = mysqli_query($conn, $queryForHostel);
    if ($record = mysqli_fetch_assoc($resultForHostel)) {
        $hosteID = $record['HostelID'];
    } else {
        echo "<script> alert('No Such Hostel Exists !!'); </script>";
    }

    $queryForRoom = "SELECT RoomID FROM ROOM WHERE Room.HostelID = '{$hosteID}' AND Room.RoomNo = '{$roomNum}'";
    $resultForRoom = mysqli_query($conn, $queryForRoom);
    if ($record = mysqli_fetch_assoc($resultForRoom)) {
        $roomID = $record['RoomID'];

        $query = "UPDATE STUDENT, GUARDIAN SET 
                Stu_NIC = '{$NIC}', 
                Stu_FName = '{$firstName}',
                Stu_LName = '{$lastName}',
                Stu_Gender = '{$gender}',
                Stu_BirthDate = '{$bDate}',
                Stu_PhoneNum = '{$contactNumber}',   
                Stu_Address = '{$address}',
                Stu_Faculty = '{$faculty}', 
                Stu_Batch = '{$batch}',
                RoomID = '{$roomID}',
                CheckInDate = '{$check_in_date}',
                CheckOutDate = '{$check_out_date}',
                AmountPaid = '{$amountPaid}',
                Guar_FName = '{$guar_fname}',
                Guar_LName = '{$guar_lname}',
                Guar_NIC = '{$guar_nic}',
                Guar_TelNum = '{$guar_telnum}',
                Guar_Email = '{$guar_email}',
                Occupation = '{$guar_occupation}',
                Relationship = '{$guar_relationship}' 

                WHERE Student.StudentID = Guardian.StudentID AND Student.StudentID = '{$studentID}' ";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script> alert('Record Updated Successfully'); </script>";
        } else {
            echo "<script> alert('Record Cannot Update'); </script>";
        }
    } else {
        echo "<script> alert('No Such Room Number Exists !!'); </script>";
    }
}

if (isset($_POST['stu_delete'])) {

    $studentID = $_POST['stu_id'];
    $query = "DELETE FROM STUDENT WHERE StudentID = '{$studentID}'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $studentID = '';
        echo "<script> alert('Record Deleted Successfully'); </script>";
    } else {
        echo "<script> alert('Record Cannot Delete'); </script>";
    }
}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <title>Student Details</title>
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
                        <h2 class="page-title">Student Details </h2>
                        <form method="post" action="studentDetails.php" name="registration" class="form-horizontal">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">

                                        <div class="panel-heading">Student Details</div>
                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> NIC : </label>
                                                <div class="col-sm-8">
                                                    <input type="search" name="stu_nic" id="stu_nic" required class="form-control" value="<?php echo (isset($NIC)) ? $NIC : ''; ?>">
                                                </div>
                                                <button type="submit" name="stu_search" id="stu_search" class="btn btn-primary"> Search </button>
                                                <button type="submit" name="stu_clear" id="stu_clear" class="btn btn-primary"> Clear </button>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Student ID : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_id" id="stu_id" readonly="true" class="form-control" value="<?php echo (isset($studentID)) ? $studentID : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> First Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_fname" id="stu_fname" class="form-control" value="<?php echo (isset($firstName)) ? $firstName : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Last Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_lname" id="stu_lname" class="form-control" value="<?php echo (isset($lastName)) ? $lastName : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Gender : </label>
                                                <div class="col-sm-8">
                                                    <select name="stu_gender" id="stu_gender" class="form-control">
                                                        <option value="Male">Male</option>
                                                        <option value="Female" <?php if ($gender == "Female") echo ' selected="selected"' ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Birth Date : </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="stu_bdate" id="stu_bdate" class="form-control" value="<?php echo (isset($bDate)) ? $bDate : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Contact No : </label>
                                                <div class="col-sm-8">
                                                    <input type="tel" name="stu_contact" id="stu_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" value="<?php echo (isset($contactNumber)) ? $contactNumber : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Address : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_address" id="stu_address" class="form-control" value="<?php echo (isset($address)) ? $address : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Faculty : </label>
                                                <div class="col-sm-8">
                                                    <select name="stu_faculty" id="stu_faculty" class="form-control">
                                                        <option value="Faculty of Agriculture">Faculty of Agriculture</option>
                                                        <option value="Faculty of Allied Health Sciences" <?php if ($faculty == "Faculty of Allied Health Sciences") echo ' selected="selected"' ?>>Faculty of Allied Health Sciences</option>
                                                        <option value="Faculty of Arts" <?php if ($faculty == "Faculty of Arts") echo ' selected="selected"' ?>>Faculty of Arts</option>
                                                        <option value="Faculty of Dental Sciences" <?php if ($faculty == "Faculty of Dental Sciences") echo ' selected="selected"' ?>>Faculty of Dental Sciences</option>
                                                        <option value="Faculty of Engineering" <?php if ($faculty == "Faculty of Engineering") echo ' selected="selected"' ?>>Faculty of Engineering</option>
                                                        <option value="Faculty of Management" <?php if ($faculty == "Faculty of Management") echo ' selected="selected"' ?>>Faculty of Management</option>
                                                        <option value="Faculty of Medicine" <?php if ($faculty == "Faculty of Medicine") echo ' selected="selected"' ?>>Faculty of Medicine</option>
                                                        <option value="Faculty of Science" <?php if ($faculty == "Faculty of Science") echo ' selected="selected"' ?>>Faculty of Science</option>
                                                        <option value="Faculty of Veterinary Medicine and Animal Science" <?php if ($faculty == "Faculty of Veterinary Medicine and Animal Science") echo ' selected="selected"' ?>>Faculty of Veterinary Medicine and Animal Science</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Batch : </label>
                                                <div class="col-sm-8">
                                                    <select name="stu_batch" id="stu_batch" class="form-control">
                                                        <option value="20 Batch">20 Batch</option>
                                                        <option value="19 Batch" <?php if ($batch == "19 Batch") echo ' selected="selected"' ?>>19 Batch</option>
                                                        <option value="18 Batch" <?php if ($batch == "18 Batch") echo ' selected="selected"' ?>>18 Batch</option>
                                                        <option value="17 Batch" <?php if ($batch == "17 Batch") echo ' selected="selected"' ?>>17 Batch</option>
                                                        <option value="16 Batch" <?php if ($batch == "16 Batch") echo ' selected="selected"' ?>>16 Batch</option>
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
                                                    <select name="stu_hostel" id="stu_hostel" class="form-control">
                                                        <option value="Arunachalam Hall">Arunachalam Hall</option>
                                                        <option value="Akbar Nell Hall" <?php if ($hostel == "Akbar Nell Hall") echo ' selected="selected"' ?>>Akbar Nell Hall</option>
                                                        <option value="New Akbar Hall" <?php if ($hostel == "New Akbar Hall") echo ' selected="selected"' ?>>New Akbar Hall</option>
                                                        <option value="Marrs Hall" <?php if ($hostel == "Marrs Hall") echo ' selected="selected"' ?>>Marrs Hall</option>
                                                        <option value="Marcus Fernando Hall" <?php if ($hostel == "Marcus Fernando Hall") echo ' selected="selected"' ?>>Marcus Fernando Hall</option>
                                                        <option value="Jayathilake Hall" <?php if ($hostel == "Jayathilake Hall") echo ' selected="selected"' ?>>Jayathilake Hall</option>
                                                        <option value="Hindagala Hall" <?php if ($hostel == "Hindagala Hall") echo ' selected="selected"' ?>>Hindagala Hall</option>
                                                        <option value="James Peris Hall" <?php if ($hostel == "James Peris Hall") echo ' selected="selected"' ?>>James Peris Hall</option>
                                                        <option value="Ivor Jennings Hall" <?php if ($hostel == "Ivor Jennings Hall") echo ' selected="selected"' ?>>Ivor Jennings Hall</option>
                                                        <option value="Senaka Bibile Hall" <?php if ($hostel == "Senaka Bibile Hall") echo ' selected="selected"' ?>>Senaka Bibile Hall</option>
                                                        <option value="Ramanathan Hall" <?php if ($hostel == "Ramanathan Hall") echo ' selected="selected"' ?>>Ramanathan Hall</option>
                                                        <option value="Sangamitta Hall" <?php if ($hostel == "Sangamitta Hall") echo ' selected="selected"' ?>>Sangamitta Hall</option>
                                                        <option value="Hilda Obeysekara Hall" <?php if ($hostel == "Hilda Obeysekara Hall") echo ' selected="selected"' ?>>Hilda Obeysekara Hall</option>
                                                        <option value="Wijewardana Hall" <?php if ($hostel == "Wijewardana Hall") echo ' selected="selected"' ?>>Wijewardana Hall</option>
                                                        <option value="Gunapala Malalasekara" <?php if ($hostel == "Gunapala Malalasekara") echo ' selected="selected"' ?>>Gunapala Malalasekara</option>
                                                        <option value="Ediriweera Sarachchandra" <?php if ($hostel == "Ediriweera Sarachchandra") echo ' selected="selected"' ?>>Ediriweera Sarachchandra</option>
                                                        <option value="Sarasavi Madura Hall" <?php if ($hostel == "Sarasavi Madura Hall") echo ' selected="selected"' ?>>Sarasavi Madura Hall</option>
                                                        <option value="Sarasaviuyana Hall" <?php if ($hostel == "Sarasaviuyana Hall") echo ' selected="selected"' ?>>Sarasaviuyana Hall</option>
                                                        <option value="Wilagedara Bikku Hostel" <?php if ($hostel == "Wilagedara Bikku Hostel") echo ' selected="selected"' ?>>Wilagedara Bikku Hostel</option>
                                                        <option value="Kehelpannala Bikku Hostel" <?php if ($hostel == "Kehelpannala Bikku Hostel") echo ' selected="selected"' ?>>Kehelpannala Bikku Hostel</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Room No : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_room_no" id="stu_room_no" class="form-control" value="<?php echo (isset($roomNum)) ? $roomNum : ''; ?>">
                                                </div>
                                            </div>

                                            <div class=" form-group">
                                                <label class="col-sm-2 control-label"> Check-In Date : </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="stu_checkin" id="stu_checkin" class="form-control" value="<?php echo (isset($check_in_date)) ? $check_in_date : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Check-Out Date : </label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="stu_checkout" id="stu_checkout" class="form-control" value="<?php echo (isset($check_out_date)) ? $check_out_date : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Amount Paid : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="stu_amount" id="stu_amount" class="form-control" value="<?php echo (isset($amountPaid)) ? $amountPaid : ''; ?>">
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
                                                    <input type="text" name="gur_fname" id="gur_fname" class="form-control" value="<?php echo (isset($guar_fname)) ? $guar_fname : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Last Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gur_lname" id="gur_lname" class="form-control" value="<?php echo (isset($guar_lname)) ? $guar_lname : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> NIC : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gur_nic" id="gur_nic" class="form-control" value="<?php echo (isset($guar_nic)) ? $guar_nic : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Contact No : </label>
                                                <div class="col-sm-8">
                                                    <input type="tel" name="gur_contact" id="gur_contact" class="form-control" pattern="[0-9]{3}-[0-9]{7}" value="<?php echo (isset($guar_telnum)) ? $guar_telnum : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Email : </label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="gur_email" id="gur_email" class="form-control" value="<?php echo (isset($guar_email)) ? $guar_email : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Ocuupation : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gur_ocuupation" id="gur_ocuupation" class="form-control" value="<?php echo (isset($guar_occupation)) ? $guar_occupation : ''; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Relationship : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="gur_relationship" id="gur_relationship" class="form-control" value="<?php echo (isset($guar_relationship)) ? $guar_relationship : ''; ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-4">
                                <input type="submit" id="stu_update" name="stu_update" Value="Update" class="btn btn-primary">
                                <button type="submit" name="stu_delete" id="stu_delete" class="btn btn-primary"> Delete </button>
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

<?php mysqli_close($conn); ?>