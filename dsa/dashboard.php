<?php
session_start();
//echo "person id=".$_SESSION['personid'];

if(!isset($_SESSION['email'])){
   header("Location:login.php");
}

$query = $_SESSION['varname'];


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
    <title> Dashboard </title>


<style>





.three{
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
  font-size: 20px;
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
        <li><a href="logout.php"> Logout</a></li>
        </ul>
      </div>



  </nav>
    <br/><br/><br/>
<form action="dashboard.php" method="post" autocomplete="off">
<div class="container-fluid eight">
<div  class="container">
  <div class="row">
    <div class="col-md-3"><p>  Welcome <?php echo $query ?> </p></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3 text-center"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'guestdetails.php';"><b>New Request</b></button></div>
  </div>




<div class="three">
    <div class="row">
      <div class="col-md-12">


        </div>
      </div>


      <div class="row text-center five">
        <div class="col-md-1"><b>Sl.No</b></div>
        <div class="col-md-3"><b>Arrival Date</b></div>
        <div class="col-md-3"><b>Departure Date</b></div>
        <div class="col-md-2"><b>Room Alloted</b></div>
        <div class="col-md-3"><b>Status</b></div>
      </div>
      <br/>

      <?php
//echo "person id=".$_SESSION['personid'];

$mysqlHostname = "localhost";
$mysqlUsername = "root";
$mysqlPassword = "meera";
$mysqlDb = "dsadb";

$conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
or die("Connection to MySQL database failed: ". mysql_error());


mysql_select_db("$mysqlDb")
or die("Selection of database failed: ".mysql_error());

$rs= @mysql_select_db ($mysqlDb, $conn)
or die("Could not open $mysqlDb: ".mysql_error());


$selected = mysql_select_db("guestdetails2",$conn);//Selecting the database
$gid_COUNT_SQL="SELECT * FROM guestdetails2 WHERE personid='$_SESSION[personid]'";
$gid_rs =@mysql_query($gid_COUNT_SQL,$conn) or die ("could not execute GID COUNT  -- SQL query");
$gidcount= mysql_num_rows($gid_rs);

if ($gidcount>0)
{

$i=1;
  while ($row = mysql_fetch_array($gid_rs)) // while of guestdetails2
      {
        //to fetch the allotted rooms for the guest requests from room_master;
        $tgid=$row["gid"];


        //check the above room no's status for the given dates in room_status table
        $selected1 = mysql_select_db("room_status",$conn);//Selecting the database

          $roomstatus_COUNT_SQL="SELECT * FROM room_status WHERE GID= '$tgid' ";
        $roomstatus_rs =@mysql_query($roomstatus_COUNT_SQL,$conn) or die ("could not execute ROOM status -- SQL query");
        $roomstatuscount= mysql_num_rows($roomstatus_rs);
        $row1 = mysql_fetch_array($roomstatus_rs);

        if ( $roomstatuscount>=0         )
        {
            $tarrival_dt=$row1['BOOKED_DATE_FROM'];
            $tdep_dt=$row1['BOOKED_DATE_TO'];
            $tstatus=$row1['STATUS'];
            $troom_id=$row1['ROOMID'];

              //$selected2 = mysql_select_db("room_master",$conn);
            $room_number_sql = "SELECT room_no FROM room_master WHERE ROOMID = '$troom_id'";
            $room_number_sql2 =@mysql_query(  $room_number_sql ,$conn) or die ("could not execute from room master -- SQL query");
              $row2 = mysql_fetch_array($room_number_sql2);
              $troom_no=$row2['room_no'];

              $original_date1 =   $tarrival_dt;
              $original_date2 =   $tdep_dt;

              // Creating timestamp from given date
              $timestamp1 = strtotime($original_date1);
              $timestamp2 = strtotime($original_date2);


              // Creating new date format from that timestamp
              $arrival= date("d-m-Y", $timestamp1);
              $departure= date("d-m-Y", $timestamp2);
            //  echo $new_date; // Outputs: 31-03-2019


?>
            <div class="row text-center four">
            <div class="col-md-1"><?php echo  $i;  ?></div>
            <div class="col-md-3"><?php echo  $arrival;  ?></div>
            <div class="col-md-3"><?php echo $departure;?></div>
            <div class="col-md-2"><?php echo $troom_no;?></div>
            <div class="col-md-3"><?php echo $tstatus ; ?></div>
          </div>

<?php
        }
        else
        {
          echo "your request received and request id is ".$tgid;
          echo "<br> Please contact hotel administrator for allotment";
        }
            $i++;
      }//while
} //if
else
{
  echo "<h4>No Requests found...</h4>";
}


        ?>









</form>




</div>
</div>


<br/>
<br/>

</div>

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

    <div class="col-md-4 text center nine">
      &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
        <a href="#">hotelresidencia30@gmail.com</a>
    </div>
    <div class="col-md-4"></div>
</div>

</footer>
</body>
</html>
