<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


  </head>
  <body>
    <section class="section">
        <div class="container">
          <div class="row justify-content-center">
          </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <h1 class="text-center justify-content-center">User Information</h1>
                    <button type="button" class="btn btn-white  btn-lg justify-content-end" name="userprofile"><a class="text-decoration-none" href="list.php">Back</a></button>
                  </div>
                  <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Password</th>
                                  <th>Created At</th>
                                </tr>
                            </thead>
    <?php
    

     
    

      session_start();
      $email = $_SESSION['email'];

          if(isset($email)){

            require_once 'dbconn.php';
            $db = new Dbconn() ;
            $conn = $db->getConnection();

            $data = $conn->query("select * from clients where id = {$_GET['id']}");
            while($result=$data->fetch(PDO::FETCH_ASSOC)){

              echo "<tr>";
              
                  foreach($result as $std ){
                   
                    echo "<td>$std</td>";
                    
                  }
                echo "</tr>";
    
            };
            
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</section>";
        
     
          }else{
            header("Location:login.php");
          }
 

    ?>

      
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>

      </body>
    </html>