<head>
<link href="login.css" rel="stylesheet"/>
</head>
<body>
    <?php include 'header.php';?>
    <div class="login-container">
    <h2>Login</h2>
    <div class="login-container1"></div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" name="email" placeholder = "Email Address" id="email"><br>
        <input type="text" name="password" placeholder = "Password" id="password"><br>
        <button type="submit" id="submit">Login</button>
    </form>
    <h4><?php
      require_once("login_class.php");
      
      function verify_data($d){
        $d = trim($d);
        $d = stripslashes($d);
        $d = htmlspecialchars($d);
        return $d;
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email_ = verify_data($_POST["email"]);
        $pass_word = verify_data($_POST["password"]);
        $login_acc = new UserLogin($email_,$pass_word);
        if (strlen($email_) > 0 && strlen($pass_word) > 0){
          if ($login_acc->isValidLogin() == TRUE){
            header("Location:dashboard.php");
            exit();
          }
          else{
            echo"<h4>Invalid email address or password entered</h4>";
          }
        }
        else{
          echo"<h4>Invalid email address or password entered</h4>";
        }    
      } 
    ?></h4>
    <span class="login-text1">
      Copyright © 2022 Dolphin CRM
    </span>
  </div>
</body>