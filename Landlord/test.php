<?php

require 'database.php';

$sql = "SELECT * FROM property_owners";

$stmt = $conn->prepare($sql);

$stmt->execute();

$results = array_reverse($stmt->fetchAll());
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
    <div class="container-fluid">
        <div class="my-5">
            <h2>Tenants</h2>
        </div>

        <?php foreach ($results as $result) { ?>


        <div class="card">
            <div class="card-body">
                <div class="mb-3 mt-3">
                    <h5>Firstname:</h5>
                    <span><?php echo  $result->pr_firstname; ?></span>
                    <h5>Middlename:</h5>
                    <span><?php echo  $result->pr_middlename; ?></span>
                </div>
            </div>
        </div>

        <?php  } ?>

    </div>
</body>

</html>