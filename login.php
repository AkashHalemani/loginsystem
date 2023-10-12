<?php
$err=false;
$log = false;
if (isset($_POST['username'])&&isset($_POST['password']))
    {
        include 'partials/_dbconnect.php';
        
        $name = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "select * from user where username = '$name'";
        $res = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($res);
        if($num == 1)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                if(password_verify($pass,$row['password'])){
                    $log=true;
                    $log = true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$name;
                    header("location: welcome.php"); 
                }
                else{
                    $err = true;
                }
            }         
            

        }
        else{
            $err = true;
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($log){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if($err){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid details.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }


?>
    <div class="container my-4">
        <h1 class="text-center">Login to my website</h1>
        <form action="<?php $_PHP_SELF?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username"name="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password"name="password">
            </div>

          

            
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>