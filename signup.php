<?php require "functions.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Brainster</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center text-center">
          <p class="display-2 fixed-top mt-5">Sign Up Form</p>
          <form action="" method="POST" class="w-100">
          <div class="col d-flex flex-column justify-content-center align-items-center">
            <br><br><br>
          <?= validateUsername();?>
          <?= validatePassword();?>
          <?= validateEmail();?>
          <?= sendCredidentals();?>
  
              <div class="input-group flex-nowrap w-50">
                  <div class="input-group-prepend">
                    <label for="username">
                      <span class="input-group-text" id="addon-wrapping" >Username</span>
                    </label>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" id="username" name="username" value="">
              </div>
              <div class="input-group flex-nowrap w-50">
                  <div class="input-group-prepend">
                    <label for="password">
                      <span class="input-group-text" id="addon-wrapping">Password</span>
                    </label>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping" id="password" name="password">
                </div>
                <div class="input-group flex-nowrap w-50">
                  <div class="input-group-prepend">
                    <label for="email">
                      <span class="input-group-text" id="addon-wrapping" >Email</span>
                    </label>
                  </div>
                  <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping" id="email" name="email" value="">
              </div>
              <br>
                <input type="submit" value="Submit" class="btn btn-gray">
              </div>    
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>