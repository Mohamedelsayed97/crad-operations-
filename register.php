<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <?php

        if(isset($_GET['errors'])){
            // var_dump($_GET['errors']);

        }
    ?>
        <div class="container-fluid">
            <section class="vh-100" style="background-color: #eee;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                            <form class="mx-1 mx-md-4" method="post" action="controller.php" enctype="multipart/form-data">

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                                    <input type="text" id="form3Example1c" class="form-control" name="name"  />
                                                    <span class="text-danger"> <?php if(isset($_GET['errors'])) echo $_GET['errors'] ; ?></span>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                                    <input type="email" id="form3Example3c" class="form-control" name="email" />
                                                    <span class="text-danger"> <?php if(isset($_GET['errors'])) echo $_GET['errors'] ; ?></span>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example4c">Password</label>
                                                    <input type="password" id="form3Example4c" class="form-control" name="password" />
                                                    <span class="text-danger"> <?php if(isset($_GET['errors'])) echo $_GET['errors'] ; ?></span>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                                    <input type="password" id="form3Example4cd" class="form-control" name="repeatpassword" />
                                                    <span class="text-danger"> <?php if(isset($_GET['errors'])) echo $_GET['errors'] ; ?></span>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="form3Example4cd">Upload Your Image Profile</label>
                                                    <input type="file" id="form3Example4cd" class="form-control" name="imageuser" />
                                                    <span class="text-danger"> <?php if(isset($_GET['errors'])) echo $_GET['errors'] ; ?></span>
                                                    </div>
                                                </div>


                                                <div class="d-flex justify-content-evenly mx-4 mb-3 mb-lg-4">
                                                    <input type="submit" class="btn btn-primary btn-lg"  name="register" value="Register">
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                            <img src="signup.png"
                                            class="img-fluid" alt="Sample image">                                
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>