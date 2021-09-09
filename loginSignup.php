<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
      session_start();
      require_once("dbClass.php");
      $db=new dbClass();

      if(isset($_POST['loginuser']))//if the login button was hit
      {
        $userName = $_POST['loginuser'];
        $password = $_POST['password'];
        $db->checkDetails($userName,$password);//checks the login info
        $_SESSION['username']=$userName;
      }

      if(isset($_POST['signupuser']))//if the sign up button was hit
      {
        $userName = $_POST['signupuser'];
        $password = $_POST['password'];
        $str = $db->getUser($userName);
        if($str != null)//checks for valid name
        {
          $db->checkDetails2($userName);//checks the signup details
        }
        else{
            $db->signup($userName,$password);
            Header('location:home.php');//takes us to the home page
            $_SESSION['username']=$userName;//adding the username to the session
        }
      }
?>

<html>
<head>
       <title>User Login And Registration</title>
       <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="stylesheet" type="text/css" href="styling/login_style.css">
</head>
<body>
    <div class="container">
    <div class="login-box">
    <div class="row">

    <div class="col-md-6 login-left">
      <h2>Login Here</h2>
      <form  method="post">
       <div class="form-group">
         <label>Username</label>
         <input type="text" name="loginuser" class="form-control" required>
       </div>
       <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" class="form-control" required>
       </div>
      <button type="submit" class="btn btn-primary">Login</button>
      </form>

    </div>
    <div class="col-md-6 login-right" >
      <h2>Register Here</h2>
      <form action="loginSignup.php" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="signupuser" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>

