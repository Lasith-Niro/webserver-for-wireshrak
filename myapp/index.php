<?php
   session_start();
   $errorMsg = "";
   $validUser = $_SESSION["login"] === true;
   if(isset($_POST["sub"])) {
   $validUser = $_POST["username"] == "admin" && $_POST["password"] == "password";
   if(!$validUser) $errorMsg = "Invalid username or password.";
   else $_SESSION["login"] = true;
   }
   if($validUser) {
      header("Location: ./login-success.php"); die();
   }
?>
<!DOCTYPE html>
<html>

<head>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <title>Login</title>
   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
         background-color: #ADABAB;
      }

      .form-signin {
         max-width: 330px;
         padding: 15px;
         margin: 0 auto;
         color: #017572;
      }

      .form-signin .form-signin-heading,
      .form-signin .checkbox {
         margin-bottom: 10px;
      }

      .form-signin .checkbox {
         font-weight: normal;
      }

      .form-signin .form-control {
         position: relative;
         height: auto;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         padding: 10px;
         font-size: 16px;
      }

      .form-signin .form-control:focus {
         z-index: 2;
      }

      .form-signin input[type="email"] {
         margin-bottom: -1px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
         border-color: #017572;
      }

      .form-signin input[type="password"] {
         margin-bottom: 10px;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
         border-color: #017572;
      }

      h2 {
         text-align: center;
         color: #017572;
      }
   </style>
</head>

<body>
   <div class="container">
      <form name="input" class="form-signin" action="" method="post">
         <label for="username">Username:</label><input class="form-control" type="text"
            value="<?= $_POST["username"] ?>" id="username" name="username" />
         <label for="password">Password:</label><input type="password" class="form-control" value="" id="password"
            name="password" />
         <div class="error"><?= $errorMsg ?></div>
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit" name="sub" />
      </form>
   </div>
</body>

</html>