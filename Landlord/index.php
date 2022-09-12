<?php
require "Database.php";

if(isset($_POST["Submit"])){
$Firstname=$_POST["Firstname"];
$Middlename = $_POST["Middlename"];
$Lastname = $_POST["Lastname"];
$EmailAddress = $_POST["EmailAddress"];
$PhoneNumber = $_POST["PhoneNumber"];
$Gender = $_POST["Gender"];
$NationalID = $_POST["NationalID"];
$Address = $_POST["Address"];
$OwnerID = strtoupper(uniqid());
$PropertyID = strtoupper(uniqid());

$sql= "INSERT INTO property_owners (
property_id, owner_id, pr_Firstname, pr_middlename, pr_lastname, pr_email, pr_phonenumber, pr_gender, pr_national_id, pr_address
) VALUES(?,?,?,?,?,?,?,?,?,?)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(1,$PropertyID);
$stmt->bindParam(2,$OwnerID);
$stmt->bindParam(3,$Firstname);
$stmt->bindParam(4,$Middlename);
$stmt->bindParam(5,$Lastname);
$stmt->bindParam(6, $EmailAddress);
$stmt->bindParam(7, $PhoneNumber);
$stmt->bindParam(8, $Gender);
$stmt->bindParam(9, $NationalID);
$stmt->bindParam(10, $Address);
$stmt->execute();
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../assets/logo.png" alt="logo"
                    class="img-fluid resized my-2 mx-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid g-0 form-bg p-3">
        <div class="form-overlay w-50 p-3 mx-auto">
            <h3 class="py-3">Personal Information</h3>
            <form method="POST">
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="Firstname" class="form-control" id="floatingFirstname"
                                placeholder="Firstname">
                            <label for="floatingFirstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="Middlename" class="form-control" id="floatingMiddlename"
                                placeholder="Middlename">
                            <label for="floatingMiddlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="Lastname" class="form-control" id="floatingLastname"
                                placeholder="Lastname">
                            <label for="floatingLastname">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="email" name="EmailAddress" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="PhoneNumber" class="form-control" id="floatingPhoneNumber"
                                placeholder="PhoneNumber">
                            <label for="floatingPhoneNumber">Phone Number</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <select class="form-control" name="Gender" id="floatingInput">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label for="floatingInput">Gender</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" name="NationalID" class="form-control" id="floatingNationalID"
                                placeholder="NationalID">
                            <label for="floatingNationalID">National ID</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="Address" class="form-control" id="floatingAddress" placeholder="Address">
                    <label for="floatingAddress">Address</label>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <input type="submit" name="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>