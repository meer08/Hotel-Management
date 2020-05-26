<?php
session_start();
error_reporting(0);
//echo "person id=".$_SESSION['personid'];
if(!isset($_SESSION['email'])){
   header("Location:login.php");
}
//$query = $_SESSION['varname'];

//echo "submitted for=".$_POST['submitted_for'];
//echo "tgidno=".$_POST['tgidno'];

//echo "yesno=".$_POST['yesno'];

if($_POST['submitted_for']=='cancel_request')
	 {

	 //updating status - field in room_status table

	  $db="dsadb";

      $conn = @mysql_connect("localhost", "root", "meera")
         or die ("Could not connect to database");

      $rs= @mysql_select_db ($db, $conn)
           or die ("Could not open $db:".mysql_error());


	$q = "select * from room_status where GID=$_POST[tgidno]";


      $result1 = mysql_query($q,$conn) or die ("Could not execute SQL-D query");

      $num = mysql_num_rows($result1);


if ($num>0 )
	 {

	 	if ($_POST['yesno']=='YES')
		{
		 $roomcancel="update room_status set STATUS='CANCELLED', REASON_FOR_CANCEL='$_POST[reason1]' where (gid=$_POST[tgidno]) ";

           $rs =@mysql_query($roomcancel,$conn)
                    or die ("could not execute CANCEL SQL-B query");


		}

	 }
	 else
	 {
	 echo " record not found in room_status table";
	 }
 }

?>


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
    <title> Process Request </title>


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

    <br/>

<form action="viewrequest.php" method="post" autocomplete="off">
<div class="container-fluid eight">

<br/>

<div  class="container">
<p > Booking Requests Received</p>

<div class="container three">
  <div class="row text-center four nine ">

  <div class="col-sm-1">Sl. No</div>
  <div class="col-sm-1">Guest Id</div>
  <div class="col-sm-1">Name</div>
  <div class="col-sm-2">Arrival Date</div>
  <div class="col-sm-2">Departure Date</div>
  <div class="col-sm-1">Status</div>
  <div class="col-sm-2">View Requests </div>
  <div class="col-sm-2">Cancel</div>

</div>
<br/>
  <?php
  /*code to connect mysql database at local host*/
  $mysqlHostname = "localhost";
  $mysqlUsername = "root";
 $mysqlPassword = "meera";
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

  $sql="select * from guestdetails2 where departure_date>=curdate();"
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
        $arrival=$trow['arrival_date'];
        $departure=$trow['departure_date'];
        $room_type=$trow['room_type'];
		$gid=$trow['gid'];
		$personid=$trow['Personid'];
		//echo "person id=".$personid;





		//fetching booking status from room_status
		$sql1="select * from room_status where GID='$gid'"
		or die("Can't room_status execute!!");

		$tresult1=mysql_query($sql1,$conn);
		$num1=mysql_num_rows($tresult1);
		//echo "num1=".$num1;
		$trow1 = mysql_fetch_array($tresult1);
		$status=$trow1['STATUS'];



		//fetching person name
		$sql2="select * from signup where Personid='$personid'"
		or die("Can't personid execute!!");

		$tresult2=mysql_query($sql2,$conn);
		$num2=mysql_num_rows($tresult2);
		//echo "num2=".$num2;
		$trow2 = mysql_fetch_array($tresult2);
		$name=$trow2['Name'];



        $original_date1 =   $arrival;
        $original_date2 =   $departure;

        // Creating timestamp from given date
        $timestamp1 = strtotime($original_date1);
        $timestamp2 = strtotime($original_date2);


        // Creating new date format from that timestamp
        $arrival_1= date("d-m-Y", $timestamp1);
        $departure_1= date("d-m-Y", $timestamp2);
        ?>

                    <div class="row text-center four">
                    <div class="col-sm-1"><?php echo  $i;  ?></div>
					<div class="col-sm-1"><?php echo  $gid;  ?></div>
					<div class="col-sm-1"><?php echo  $name;  ?></div>
                    <div class="col-sm-2"><?php echo  $arrival_1;  ?></div>
                    <div class="col-sm-2"><?php echo $departure_1;?></div>
					 <div class="col-sm-1"><?php echo $status;?></div>

                    <div class="col-sm-2"><a href="print_request.php?ttgid=<?php echo $gid; ?>" title="Request lr." target="_blank">  Click here</a></div>


					<!-- <div class="col-sm-2"><a href="#"> Click here</a></div> -->
					<?php
					if ($status=="BOOKED" ) //booked IN ROOM_STATUS
						{
							echo "<div class=\"col-sm-2\"><a href=\"cancel_req.php?ttgid=$gid\" >Yes/No</a></div>";
						}
					else
						{
							echo "<div class=\"col-sm-2\">CANCELLED</div>";
						}

					?>
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
