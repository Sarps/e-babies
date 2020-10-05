<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'hms');

//Add laboratory
if (isset($_POST['reg_lab'])) {
    // receive all input values from the form
    $patient = mysqli_real_escape_string($db, $_POST['patient']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $urine = mysqli_real_escape_string($db, $_POST['urine']);
    $blood_group = mysqli_real_escape_string($db, $_POST['blood_group']);
    $sickle_cell = mysqli_real_escape_string($db, $_POST['sickle_cell']);
    $hiv_aids = mysqli_real_escape_string($db, $_POST['hiv_aids']);
    $diabetes = mysqli_real_escape_string($db, $_POST['diabetes']);
    $malaria = mysqli_real_escape_string($db, $_POST['malaria']);
    $diarrhoea = mysqli_real_escape_string($db, $_POST['diarrhoea']);
    $cholera = mysqli_real_escape_string($db, $_POST['cholera']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($patient)) {
        array_push($errors, "Patient is required");
    }
    if (empty($date)) {
        array_push($errors, "Date is required");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO laboratory( `patient`, `date`, `urine`, `blood_group`, `diabetes`, `malaria`, `diarrhoea`, `cholera`, `hiv_aids`, `sickle_cell`)
     VALUES ('$patient','$date','$urine','$blood_group','$diabetes', '$malaria', '$diarrhoea', '$cholera', '$hiv_aids', '$sickle_cell')";
        $query_run = mysqli_query($db, $query);
        $_SESSION['status'] = "Successfully saved";

        $_SESSION['status_code'] = "success";
        array_push($errors, "Successfully saved");

    } else {
        $_SESSION['status'] = "Saving Failed";
        $_SESSION['status_code'] = "error";
        array_push($errors, "Some error occured");

    }

}

//Add appointment
if (isset($_POST['rec_vitals'])) {
    // receive all input values from the form
    $temperature = mysqli_real_escape_string($db, $_POST['temperature']);
    $pressure = mysqli_real_escape_string($db, $_POST['pressure']);
    $respiratory = mysqli_real_escape_string($db, $_POST['respiratory']);
    $pulse = mysqli_real_escape_string($db, $_POST['pulse']);
    $height = mysqli_real_escape_string($db, $_POST['height']);
    $weight = mysqli_real_escape_string($db, $_POST['weight']);
    $complaint = mysqli_real_escape_string($db, $_POST['complaint']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($temperature)) {
        array_push($errors, "temperature is required");
    }
    if (empty($pressure)) {
        array_push($errors, "pressure is required");
    }
    if (empty($respiratory)) {
        array_push($errors, "respiratory is required");
    }
    if (empty($pulse)) {
        array_push($errors, "pulse is required");
    }
    if (empty($height)) {
        array_push($errors, "height is required");
    }
    if (empty($weight)) {
        array_push($errors, "weight is required");
    }
    if (empty($complaint)) {
        array_push($errors, "complaint is required");
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO vitals( `temperature`, `pressure`, `respiratory`, `pulse`, `height`, `weight`, `complaint`)
     VALUES ('$temperature','$pressure','$respiratory','$pulse','$height','$weight', '$complaint')";
        $query_run = mysqli_query($db, $query);
        $_SESSION['status'] = "Vitals recorded successfully";

        $_SESSION['status_code'] = "success";
        array_push($errors, "Successfully saved");

    } else {
        $_SESSION['status'] = "Record Saved";
        $_SESSION['status_code'] = "error";
        array_push($errors, "Successfully not registered some error ocurred");
    }

}


?>
