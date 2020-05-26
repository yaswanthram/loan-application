<?php
  
  $db_host = "localhost";
  $db_user = "root";
  $db_pass ="";
  $db_name = "project";
  
  $db = new PDO('mysql:host=localhost;dbname='. $db_name. ';charset=utf8' ,$db_user,$db_pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn=mysqli_connect($db_host,$db_user,$db_pass,"$db_name");

  
  /*
  $servername='localhost';
  $username='root';
  $password='';
  $dbname = "project";
          $conn=mysqli_connect($servername,$username,$password,"$dbname");
          
          if(!$conn){
                      die('Could not connect mysql:' .mysql_error());
          }
*/

?>