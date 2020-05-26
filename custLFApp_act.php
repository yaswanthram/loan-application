<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="custLFApp_act.css">
    </head>
    <body>
<?php 

include ('config.php');
/*
$custID = $_REQUEST['custID'];
$custEmail = $_REQUEST['custEmail'];
$aid = $_REQUEST ['aid'];
$uname = $_REQUEST ['uname'];
*/
$statusAct = $_REQUEST ['statusAct'];
$_SESSION['msg'] =  "";
$msgFlag = "Error";
$status = "Pending";
$queryUpd = "update application set status = '$statusAct' where email = '".$_SESSION['email']."' " ;
$queryUpdd = $conn->query($queryUpd);
if ($queryUpdd)
{ $_SESSION['msg'] = "Form submitted successfully";
   $msgFlag = "Success";
}
else 
{
$_SESSION['msg'] = "Problem in Form submission";
$msgFlag = "Error";
}

$className = "error";
if($msgFlag== "Success"){
    $className = "success";
}
?>
<body>
<div class = "container signin">
<p class =  "<?php echo $className ; ?> " >
<?php echo $_SESSION['msg'] ; ?> 
</p> 
</div>
<button class = "registerbtn" onclick = "window.location.href='custList.php'"> Back </button>

</body>
</html>