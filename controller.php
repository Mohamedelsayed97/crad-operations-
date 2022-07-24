<?php

// Include the database configuration file  

  require_once 'dbconn.php';
  $db = new Dbconn() ;
  $conn = $db->getConnection();



  // Register

  if(isset($_POST['register'])){

    $name           =   $_POST['name'];
    $email          =   $_POST['email'];
    $password       =   $_POST['password'];
    $repeatPassword =   $_POST['repeatpassword'];
    // $image          =   $_FILES['imageuser'] ;
    $errors=[];
    
    if(!empty($name) && !empty($email) && !empty($password) && !empty($repeatPassword) && !empty($_FILES['imageuser'])){


      //--------------------------------Upload Image -------------------------

      // Get file info 
      $fileName = basename($_FILES["imageuser"]["name"]); 
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
      
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','gif'); 

      if(in_array($fileType, $allowTypes)){ 

      $image = $_FILES['imageuser']['tmp_name']; 
      $imgContent = addslashes(file_get_contents($image)); 

      }
      // Move Image To Folder
      move_uploaded_file($_FILES["imageuser"]["tmp_name"],"./photos/".$_FILES["imageuser"]["name"]);


      //------------------------------End Upload And Move Image-------------------------
      
      // Validation Inputs
      function validation($data){

        //$data = trim($data);                         Remove Spaces From Start Or The End OF The Word.
        $data = str_replace(' ', '', $data);         // Remove All Spaces From Any Place Of The Word.
        $data = htmlspecialchars($data);
        return $data;

      }

      $name           = validation($name);
      $email          = validation($email);
      $password       = validation($password);
      $repeatPassword = validation($repeatPassword);

      $email = filter_var($email,FILTER_VALIDATE_EMAIL);

      if(!$email){

        $errors["email"]= "email Not Valid";

      }

      if(strlen($name) < 3) {

        $errors["name"]= "Name Not Valid";
      }

      if(strlen($password) < 3) {

        $errors["password"]= "password Not Valid";
      }

      if($password !== $repeatPassword) {

        $errors["repeatPassword"]= "Password Not Valid";

      }

      if(count($errors) > 0){

        header("Location:register.php");
      }else{

        $conn->query("INSERT INTO  clients (name, email, password,image) VALUES ('$name','$email','$password','$imgContent')");

        header("Location:login.php");    

      }

    }else{

      $errors["required"]= "Please Enter All Fields";
      $errors = json_encode($errors);
      header("Location:register.php?errors=$errors");

    }

  }




 // Login

 if(isset($_POST['login'])){


    $email    = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from clients where email = '$email' && password = '$password'";

    $data = $conn->query($query);
    
    $result=$data->fetch(PDO::FETCH_ASSOC);

    session_start();
    $_SESSION['name']=$result['name'];
    $_SESSION['email']=$result['email'];



    if($result){

      header("Location:profileuser.php");

    }else{

      header("Location:login.php");

    }


}



  // Edit


    if(isset($_POST['edit'])){




    $result=  $conn->query("select * from clients where id='{$_GET['id']}'");

    $row   = $result->fetch(PDO::FETCH_ASSOC);

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $id = $_POST['id'];
  
    $query = "update clients set name='$name', email='$email', password='$password' where id = '$id'";

    $conn->query($query);

    header("Location:list.php");

    }




  // // // Delete
  if(isset($_GET['id'])){

    if(isset($_GET['delete'])){


         $result=  $conn->query("select * from clients where id='{$_GET['id']}'");
         $del_std=  $conn->query("delete * from clients where id='{$_GET['id']}'");
    
          header("Location:list.php");
    }
  }


  // //View

  if(isset($_GET['id'])){

    if(isset($_GET['view'])){


      $result=  $conn->query("select * from clients where id='{$_GET['id']}'");

      $row   = $result->fetch(PDO::FETCH_ASSOC);
  
      echo "<h3>Information About clients</h3>";
      echo "<ul>";
  
        foreach($row as $data){
  
          echo "<li>$data</li>";
  
        }
  
        echo "</ul>";
        echo "<a href='list.php' style='background-color: black; border: none; border-radius: 5px; color: white;text-decoration:none; padding: 10px 10px'>Back to Clients Table </a>";

  

    }


  }
?>