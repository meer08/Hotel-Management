
<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang ="en">
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
  <script>
  $(document).ready(function(){
    $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if(scroll>10)//50px
      {
        $("#scroll1").css("background","#ffffff");
      }
      else
        {
          $("#scroll1").css("background","transparent");
        }

    })
  })
//changing the logo
</script>
<script>
  $(function(){
    $(window).scroll(function(){
      if($(this).scrollTop()>10)
      {
        $(".navbar .navbar-brand img").attr("src","images/logo3.png");
      }
      else {
        $(".navbar .navbar-brand img").attr("src","images/logo2.png");

      }
    })
  })
  </script>
<!--on scrolling more than px, color of nav bar changes-->
  <script>
    $(document).ready(function ()
    {
      var minDate = new Date();
      $("#arrival").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        maxDate:120,
        dateFormat: 'yy/mm/dd',
        onClose: function(selectedDate){
          $('#depart').datepicker("option", "minDate",selectedDate);
        }
      });


      $("#depart").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        maxDate:120,
        dateFormat: 'yy/mm/dd',
        onClose: function(SelectedDate){
          $('#depart').datepicker("option", "minDate",selectedDate);
        }
      });


    });

  </script>


  <style>


.input-container {
  display: flex;
  width: 100%;
  margin-bottom: 10px;
}

/* Style the form icons  dodgerblue */
.icon {
  padding: 13px;
  background: #ff4641;
  color: white;
  min-width: 60px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 1px solid #ff4641;
}

  .one{
  padding: 20px 2px 20px 2px;
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
  }

  button{
    background-color: #ff4641;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;

    cursor: pointer;
    width: 75%;
  }

  a:link {
    text-decoration: none;
  }


  /*  hover effect for buttons */
  button:hover {
    opacity: 0.8;
  }
  .two{
    font-family: 'Poiret One', cursive;
    font-size: 25px;
    font-weight: bold;
    min-height: 128px;

  }
  .three{
    font-family: 'Poiret One', cursive;
    font-size: 35px;
    font-weight: bold;
  }
  .four{
  background-color: #eaf4f4;
  min-height: 400px;
  max-height: 400px;
  align-content: center;
  }
.whole{
  background-color: #eaf4f4;
  /*  background-color: #ADD8E6;*/
  min-height: 500px;
}


  </style>

<script>

</script>




</head>
<body>
<div class="whole">
<nav class="navbar fixed-top two" id="scroll1">

    <div class="container-fluid">
      <div class="navbar-header" >
        <a class="navbar navbar-brand" href="index.php">
        <img src="images/logo2.png">
        </a>

      </div>
      <div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php" > Sign Up </a> &nbsp <a href="login.php"> Login</a></li>

      </ul>
    </div>


  </nav>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
<br/>

<div class="text-center">
<div class="container one">


  <?php




  if(isset($_POST['mybutton']))
  {

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



    $arrival = $_POST['arrival'];
    $departure = $_POST['depart'];
    $room_type = $_POST['room_type'];

  //  echo "room type=".$room_type;

    // check the types of rooms wanted in room-master and its availability in room-status
      $selected = mysql_select_db("room_master",$conn);//Selecting the database
      $ROOMNO_COUNT_SQL="SELECT * FROM room_master WHERE room_description='$room_type'";
      $roomno_rs =@mysql_query($ROOMNO_COUNT_SQL,$conn) or die ("could not execute ROOM NO COUNT FROM MASTER -- SQL query");
      $roomcount= mysql_num_rows($roomno_rs);
    //  echo "room count: ".$roomcount;
      if ($roomcount>0)
      {
      //check those room no's status (booked/cancelled) in room_status table;
      $allotment=0;
        while ($row = mysql_fetch_array($roomno_rs))
            {
              $TROOMID=$row["ROOMID"];

              //check the above room no's status for the given dates in room_status table
              $selected1 = mysql_select_db("room_status",$conn);//Selecting the database

                $roomstatus_COUNT_SQL="SELECT * FROM room_status WHERE ROOMID= '$TROOMID' and status='BOOKED' and BOOKED_DATE_FROM>='$arrival' and BOOKED_DATE_TO<='$departure'";
                $roomstatus_rs =@mysql_query($roomstatus_COUNT_SQL,$conn) or die ("could not execute ROOM status -- SQL query");
                $roomstatuscount= mysql_num_rows($roomstatus_rs);
              if ($roomstatuscount>0)
                {
                //that room is already booked for the asked new request's date
                }
              else
                {
                //do the allotment and exit all loops
                $allotment=1;
                 break;
               }
         } //while

         if ($allotment==0) //to print regret msg if no rooms vacant
         {
            echo "<p align='center'> <font color=red size='6pt'> Sorry, we are booked! Please try for different dates</font></p>";
         }
         if($allotment==1)
         {
           echo "<p align='center'> <font color=green size='6pt'> Rooms are available! </font></p>";
         }
       }

     //roomcount - master -if


    else // room count from master's else
    {
    echo "Room type wanted is not available in room_master";
    }



  }
 ?>






  <form autocomplete="off" method="post" action="index.php">
  <h2 class="three"> Check Availablity</h2>
  <br/>
  <div class="row">
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">Arrival Date</div>

      </div>
      <div class="row ">
        <div class="col-md-12 input-container"><i class="fa fa-calendar icon"></i><input class="input-field" type="text" name="arrival" id="arrival" required/></div>


      </div>
    </div>


    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">Departure Date</div>
      </div>
      <div class="row">
        <div class="col-md-12 input-container"><i class="fa fa-calendar icon"></i><input class="input-field" type="text" name="depart" id="depart" required/></div>
    </div>
    </div>

    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12 ">Room Type</div>
      </div>
        <div class="row">
          <div class="col-md-12 input-container">

          <select class="suit-select input-field" name="room_type" id="room_type" >
              <option value="Single">Single</option>
              <option value="Twin">Twin</option>
              <option value="Triple">Triple</option>
              <option value="Quad">Quad</option>
          </select>
      </div>
    </div>

  </div>
  <div class="col-md-3"><br/> <button type="submit" name="mybutton" class="btn btn-primary" id="mybutton"><b>Check</b></button></div>


</form>

</div>
</div>
</div>
<br/>

</div>
<div class=" four">
<div class="container text-center" >


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images/three-1.jpg" alt="First slide">
  </div>
  <div class="carousel-item">
    <img src="images/four_1.jpg" alt="Second slide">
  </div>
  <div class="carousel-item">
    <img  src="images/one_1.jpg" alt="Third slide">
  </div>
  <div class="carousel-item">
    <img  src="images/two_1.jpg" alt="Fourth slide">
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
<br/>
<br/>
<br/>

</div>
</div>
</div>
</div>


</body>

</html>
