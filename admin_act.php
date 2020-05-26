<?php 
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin action</title>
    <link rel="stylesheet" type="text/css" href="admin_act.css">
  </head>
  
  <body>

    <div class = "container">
      <p><?php echo $_SESSION['msg']; ?></p> 
    </div>
      <button onclick="window.location.href='<?php echo $_SESSION['location']; ?>'">Back</button>
    </div>
</body>
</html>
