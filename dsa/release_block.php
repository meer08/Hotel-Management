


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Residencia</title>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.4.js" ></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="a.css">
    <title> Release block </title>


<style>
.three{
  border: 3px solid #f1f1f1;

}
.ten{
  border: 3px solid #f1f1f1;

}
.nine{
  font-family: 'Poiret One', cursive;
  font-size: 20px;
  font-weight: bold;
}

button{
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}


/*  hover effect for buttons */
button:hover {
  opacity: 0.8;
}

.one{
  display: flex;
  justify-content: center;
  padding-top: 100px;

}
span.psw {
  float: right;
  padding-top: 16px;
}

.two{
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
  min-height: 128px;
  background-color: #eaf4f4;
}
p{
  font-family: 'Poiret One', cursive;
  font-size: 30px;
  font-weight: bold;
}
.four{
  font-family: 'Poiret One', cursive;
  font-size: 16px;
  font-weight: bold;
}
.five{
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
}

.fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
}
.six{
  max-width: 99%;
  background-color: #eaf4f4;
}
.eight{
  min-height: 500px;
}

a:link {
  text-decoration: none;
}
</style>


</head>

<body>
<nav class="navbar  two" id="scroll1">
  <div class="container-fluid">
        <div class="navbar-header" >
          <a class="navbar navbar-brand" href="index.php">
          <img src="images/logo2.png">
          </a>

        </div>
        <div>

        <ul class="nav navbar-nav navbar-right">
		<li><a href="admin.php"> Dashboard</a> &nbsp&nbsp&nbsp <a href="logout.php"> Logout</a> </li>

        </ul>
      </div>
</nav>
<?php

session_start();
error_reporting(0);
require_once("includes\dbconnect.php");
//echo "person id=".$_SESSION['personid'];
if(!isset($_SESSION['email']))
{
   header("Location:login.php");
}


//$query = $_SESSION['varname'];

//echo "submitted for=".$_POST['submitted_for'];
//echo "tgidno=".$_POST['tgidno'];

//echo "yesno=".$_POST['yesno'];

//if($_POST['submitted_for']=='cancel_request')
	$ttbid=$_REQUEST['tbid'];
	if(isset($_REQUEST['tbid']))
	 {

		 $sql1= "update blocked_dates set status='Released' where bid=$ttbid";

    	   $rs1 =@mysql_query($sql1,$conn) or die ("could not execute update SQL query");

    	echo "<p><font color=\"blue\"> All rooms released on the selected dates..... </font></p>";
 }

?>

    <br/>

<form action="release_block.php" method="post" autocomplete="off">
<div class="container-fluid eight">

<br/>

<div  class="container">
<p > Blocked dates</p>

<div class="container three">
  <div class="row text-center four nine ">

  <div class="col-sm-1">Sl. No</div>
  <div class="col-sm-3">From Date</div>
  <div class="col-sm-3">To Date</div>
  <div class="col-sm-2">Reason</div>
  <div class="col-sm-3">Release Block</div>




</div>
<br/>
  <?php
  /*code to connect mysql database at local host*/
  $mysqlHostname = "localhost";
  $mysqlUsername = "root";
  $mysqlPassword = "meera";
 //$mysqlPassword = "nazarene";
  //$mysqlPassword = "";
  $mysqlDb = "dsadb";

  $conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
  or die("Connection to MySQL database failed: ". mysql_error());


  mysql_select_db("$mysqlDb")
  or die("Selection of database failed: ".mysql_error());

  $rs= @mysql_select_db ($mysqlDb, $conn)
  or die("Could not open $mysqlDb: ".mysql_error());

  $selected = mysql_select_db("login",$conn);
  //To enter the data into mysql

  $sql="select * from blocked_dates where to_date>=curdate() and status=' ';"
  or die("Can't execute!!");

  $tresult=mysql_query($sql,$conn);
  $num=mysql_num_rows($tresult);
  //echo "num=".$num;

  if($num==0)
  {
    echo "No data found!";
  }
  else {
      $i=0;//sl.  no.


      while($trow = mysql_fetch_array($tresult))
      {  $i++;
        $from=$trow['from_date'];
        $to=$trow['to_date'];
        $reason=$trow['reason'];
		$bid=$trow['bid'];
		$status=$trow['status'];
		//echo "person id=".$personid;




        $original_date1 =   $from;
        $original_date2 =   $to;

        // Creating timestamp from given date
        $timestamp1 = strtotime($original_date1);
        $timestamp2 = strtotime($original_date2);


        // Creating new date format from that timestamp
        $arrival_1= date("d-m-Y", $timestamp1);
        $departure_1= date("d-m-Y", $timestamp2);
        ?>

                    <div class="row text-center four">
                    <div class="col-sm-1"><?php echo  $i;  ?></div>
					<div class="col-sm-3"><?php echo  $arrival_1;  ?></div>
                    <div class="col-sm-3"><?php echo $departure_1;?></div>

					<div class="col-sm-2"><?php echo $reason;?></div>



				<div class="col-sm-3"><a href="release_block.php?tbid=<?php echo $bid; ?>" > Click here</a></div>







<!--  <div class="col-sm-2"><a href="print_request.php?ttgid=<?php //echo $gid; ?>" title="Request lr." target="_blank">  Click here</a></div>
 -->
					<!-- <div class="col-sm-2"><a href="#"> Click here</a></div> -->

                  </div>
                  <?php
      }


  }

?>
</div>
</div>
</div>


<br/>
<br/>


</form>
<footer class="six">

<div class="row">
  <div class="col-md-4"></div>

    <div class="col-md-4 text center">
        &nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
        <a href="#" class="fa fa-facebook"></a> &nbsp&nbsp
        <a href="#" class="fa fa-twitter"></a> &nbsp&nbsp
        <a href="#" class="fa fa-instagram"></a> &nbsp&nbsp
    </div>
<div class="col-md-4"></div>
</div>

<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4 text center ten nine">
      &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
        <a href="#">hotelresidencia30@gmail.com</a>
    </div>
    <div class="col-md-4"></div>
</div>

</footer>
</body>
</html>
