<?php
session_start();
if(!$_SESSION['loggedin']||$_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}
$username = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "Welcome - $username";?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php require'partials/_nav.php'?>
   <div class="container"> 
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?php echo " Welcome - $username";?></h4>
        <p>You have successfully loggedin in my first ever login website.</p>
        <hr>
        <p class="mb-0">Congrats!<a href="/loginsystem/logout.php">Click here to logout.</a></p>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>