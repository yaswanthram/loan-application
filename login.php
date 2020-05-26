
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="login.css">

    </head>
    <body>
        <div class="container">
            <form action="login_act.php" method="POST">
            
                <h1>LOGIN</h1>
                
                <label for="emailid"><b>Email</b></label><br>
                <input type="text" placeholder="Enter Email" name="email" required>
                <br>
                <label for="password"><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" name="psw" required><br>
                <div class="btn">
                <button type="submit" class="btn-login">Login</button>
                </div>
            
            <div class="register">
                <p>Don't have an account? <a href="registration.php">Register</a>.</p>
            </div>
            </form>
          </div>

          <?php
/*
          echo "session['firstname']";
          echo $_SESSION['firstname'];
          echo "session['email']";
          echo $_SESSION['email'];
          echo "[app_msg]";
          echo $_SESSION['app_msg'];
          echo "[app_loc]";
          echo $_SESSION['app_location'];
          echo "[reg_msg]";
          echo $_SESSION['reg_msg'];
          */
          ?>
    </body>
</html>
