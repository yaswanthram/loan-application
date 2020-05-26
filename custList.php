<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="admin_act.css">
    </head>
    <style>
        .customers{
            width:100%;
        }
        table,th,td{
            border: 1px solid red;
            border-collapse : collapse;   
            align-self: center;  
        }
        th,td{
            padding:20px;
            text-align: left;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        th {
            background-color: rgb(53, 146, 56);
            color: white;
        }
    </style>

    <body> 

        <?php 
            $query = " select * from application where status = 'pending' " ;
            $supportQry = $conn -> query ($query);
            $row=mysqli_fetch_array($supportQry);
            $cntt = mysqli_num_rows($supportQry);
        
            if ($cntt > 0)
            {   
        ?>
        <table class="customers"> 
            <tr>
                <th> Name </th>
                <th> Email </th>
                <th> Purpose </th>
            </tr>
            <?php $qryForm = $conn -> query($query);
                while($row = mysqli_fetch_array($qryForm) ) 
                { $email=$row['email'];
            ?>
            <tr onclick = "window.location.href='custLFApproval.php?email=<?php echo $email; ?>'" style="cursor:pointer;">
                <td> <?php echo $row ['fname']." ".$row['lname']; ?> </td>
                <td> <?php echo $row ['email'];?> </td>
                <td> <?php echo $row ['purpose'];?> </td>
            </tr> 
            <?php } ?>
        </table>
        <?php 
        } 
        else{
        ?>
        <table class = "customers">
            <tr> <th>NO RECORDS FOUND </th> </tr> 
        </table>
        <?php
        }
        ?>
    </body>
</html>


