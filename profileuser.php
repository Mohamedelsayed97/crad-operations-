<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <style>
    body{padding-top:30px;}
    
        .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

        small {
        display: block;
        line-height: 1.428571429;
        color: #999;
        }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

<?php

require_once 'dbconn.php';
$db = new Dbconn() ;
$conn = $db->getConnection();


session_start();
$name  =  $_SESSION['name'];
$email = $_SESSION['email'];


if(!empty($email)){

// Include the database configuration file  
require_once 'dbconn.php';
$db = new Dbconn() ;
$conn = $db->getConnection();

// Get image data from database 

    $query = "SELECT image FROM clients WHERE email = '$email'";

    $result = $conn->query($query); 

}else{

    header("Location:login.php");

}

?>


<div class="container">
    <div class="row justify-content-center" style="margin-top:150px ;">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4 class="text-capitalize text-center"> Hello <?php echo $name ;?></h4>
                            <p class=" text-center">Your Email : <?php echo $email ;?></p>

                            <?php if($result->rowCount() > 0){ 
                                     while($row = $result->fetch(PDO::FETCH_ASSOC)){ ?> 
                                        <img class="img-rounded img-thumbnail img-responsive w-100"  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
                                    <?php } ?> 
                            <?php }else{ ?> 
                                <p class="status error">Image not found...</p> 
                            <?php } ?>

                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="button" class="btn btn-white  btn-lg" name="userprofile"><a class="text-decoration-none" href="list.php">Go To Home</a></button>
                                <button type="button" class="btn btn-white  btn-lg" name="userprofile"><a class="text-decoration-none" href="login.php">Log Out</a></button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>


