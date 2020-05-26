<?php
session_start();
include('config.php');
$_SESSION['email']=$_REQUEST['email'];
?>

<html>
    <head>
        <title>Application approval</title>
        <link rel="stylesheet" href="custLFApproval.css">
    </head>
<body>

    <?php

    $query = "select * from application where email = '".$_SESSION['email']."' ";
    $supportQry = $conn -> query ($query);
    $row = mysqli_fetch_array($supportQry);
    $cntt = mysqli_num_rows($supportQry);
/*
    $uEmail=$row['email'];

    $uName=$_SESSION['admin'];
*/
    $flagCK="NO";
/*
    $query="SELECT * FROM loan_form where email='$uEmail' and cust_id='$uID'";



    $supportQry=$conn->query($query);

    $cntt=mysqli_num_rows($supportQry);
*/
    $dfname="";
    $dlname="";
    $dage="";
    $ddob="";
    $dmincome="";
    $dlaneed="";
    $dpurpose="";
    $dtenure="";
    $dstatus="";

    if($cntt > 0){

        $flagCK="YES";



        $qryForm=$conn->query($query);

        while($row=mysqli_fetch_array($qryForm)){

            $dfname=$row['fname'];

            $dlname=$row['lname'];

            $dage=$row['age'];

            $demail=$row['email'];

            $ddob=$row['date_of_birth'];

            $dmincome=$row['income'];

            $dlaneed=$row['loan_amt'];

            $dpurpose=$row['purpose'];

            $dtenure=$row['tenure'];

            $dstatus=$row['status'];

        }

    }

    $statMsg="Please fill in this Loan Application form.";

    if($dstatus=="pending"){

        $statMsg="Loan Application form is pending.";    }

        else if($dstatus=="approved"){

            $statMsg="Loan Application form is approved.";

        }

        else if($dstatus=="rejected"){

            $statMsg="Loan Application form is rejected.";

        }

?>

<form action="custLFApp_act.php" method="POST">

<div class="container">

<h1 style="align:center;">Application Form</h1>

<p><?PHP echo $statMsg; ?> </p>

<hr>



<div class="from1">

<label for="fname"><b>First Name</b></label>

<br>

<input type="text" placeholder="Enter First Name" name="fname" value="<?PHP echo $dfname; ?>"

 <?PHP if($flagCK=="YES"){ ?> disabled <?PHP } ?> required><br><br>



<label for="lname"><b>Last Name</b></label>

<br>

<input type="text" placeholder="Enter Last Name" name="lname" value="<?PHP echo $dlname; ?>" <?PHP if($flagCK=="YES"){

    ?> disabled <?PHP } ?> required><br><br>



<label for="email"><b>Email</b></label>

<br>

<input type="text" placeholder="Enter Email" name="email" value="<?PHP echo $_SESSION['email']; ?>" disabled required><br><br>



<label for="age"><b>Age</b></label><br>

<input type="text" placeholder="Enter Age" name="age" value="<?PHP echo $dage; ?>" <?PHP if($flagCK=="YES"){

    ?> disabled <?PHP } ?> required><br><br>



<label for="dob"><b>DOB</b></label><br>

<input type="text" placeholder="Enter DOB" name="dob" value="<?PHP echo $ddob; ?>" <?PHP if($flagCK=="YES"){

    ?> disabled <?PHP } ?> required><br><br>



<label for="mIncome"><b>Monthly Income</b></label><br>

<input type="text" placeholder="Enter Monthly Income" name="mIncome" value="<?PHP echo $dmincome; ?>" <?PHP if($flagCK=="YES"){

    ?> disabled <?PHP } ?> required><br><br>



<label for="lAmount"><b>Loan Amount Needed</b></label><br>

<input type="text" placeholder="Enter Loan Amount" name="lAmout" value="<?PHP echo $dlaneed; ?>" 

<?PHP if($flagCK=="YES"){ ?> disabled <?PHP } ?> required><br><br>



<label for="purpose"><b>Purpose</b></label><br>

 

    <select id="purpose" name="purpose" <?PHP if($flagCK=="YES"){ ?> disabled <?php } ?>>

    <option value="Housing loan" <?php if($dpurpose=="" || $dpurpose == "housing"){echo "selected";} ?>>Housing Loan</option>

    <option value="Car Loan" <?php if($dpurpose=="car"){ echo "selected";}?>>Car Loan</option>

    <option value="Personal Loan" <?php if($dpurpose=="personal"){echo "selected";}?>>Personal Loan

    </option>

    </select><br><br> 

    <hr>

</div>



<div class="tenure">

    <label class="tenure" for="tenure"><b>Please select the tenure</b></label><br>

<input type="radio" id="sixmn" name="tenure" value="6 months" <?PHP if($dtenure=="6")

{ echo "checked";} ?> <?php if($flagCK== "YES"){ ?> disabled <?php } ?>>

<label for="sixmn">6 Months</label><br>

<input type="radio" id="twmn" name="tenure" value="12 months" <?PHP if($dtenure=="12")

{ echo "checked";} ?> <?php if($flagCK== "YES"){ ?> disabled <?php } ?>>

<label for="twmn">12 Months</label><br>

<input type="radio" id="twnmn" name="tenure" value="24 months" <?PHP if($dtenure=="24")

{ echo "checked";} ?> <?php if($flagCK== "YES"){ ?> disabled <?php } ?>>

<label for="twnmn">24 Months</label><br>

<input type="radio" id="thrmn" name="tenure" value="32 months" <?PHP if($dtenure=="32")

{ echo "checked";} ?> <?php if($flagCK== "YES"){ ?> disabled <?php } ?>>

<label for="thrmn">32 Months</label><br>

</div>

<hr>



<input type="hidden" name="custID" value="<?PHP echo $uID; ?>">

<input type="hidden" name="custEmail" value="<?PHP echo $uEmail; ?>">

<input type="hidden" name="aid" value="<?php echo $aID; ?>">

<input type="hidden" name="uname" value="<?php echo $uName; ?>">

<div class="btn-group">



    <button type="submit" style="width:25%" class="btn-accept" name="statusAct" value="approved">Accept</button>

    <button type="submit" style="width:25%" class="btn-reject" name="statusAct" value="rejected">Reject</button>

    <button type="button" style="width:25%" class="btn-back" onclick="window.location.href='custList.php'">Back</button>

    </div>





</div>

</form>


</body>

</html>