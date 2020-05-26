<?php
session_start();
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Application action</title>
    <link href="login_act.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <p><h3><?php echo $_SESSION['firstname']; ?>, </h3><span><?php echo $_SESSION['app_msg']; ?></span></p>
    </div>

    <button onclick="window.location.href='<?php echo $_SESSION['app_location']; ?>'">Back</button>
        
</body>
</html>