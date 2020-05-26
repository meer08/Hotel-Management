<!---Guest details -- Old-->
<?php
session_start();
if(!isset($_SESSION['email'])){
   header("Location:login.php");
}

$query = $_SESSION['varname'];
$query2 = $_SESSION['varname2'];
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
    <title> Guest Details </title>


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

    font-family: 'Poiret One', cursive;
    border: 3px solid #f1f1f1;

    font-size: 20px;
    font-weight: bold;

  }

    button{

      color: white;

      padding: 50px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 30%;
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
      background-color: #eaf4f4;
    }
    p{

      font-family: 'Poiret One', cursive;
      font-size: 30px;
      font-weight: bold;
    }
    .seven {
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
    .nine{
      font-family: 'Poiret One', cursive;
      font-size: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <nav class="navbar two" id="scroll1">

      <div class="container-fluid">
        <div class="navbar-header" >
          <a class="navbar navbar-brand" href="index.php">
          <img src="images/logo2.png">
          </a>

        </div>
        <div>

        <ul class="nav navbar-nav navbar-right">
          <li></li>
          <li><a href="dashboard.php"> Dashboard </a> &nbsp <a href="logout.php"> Logout</a></li>

        </ul>
      </div>



  </nav>
    <br/><br/><br/>

  <?php
  /*code to connect mysql database at local host*/
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

  $selected = mysql_select_db("guestdetails2",$conn);//Selecting the database

  //To enter the data into mysql

    //echo "name= ".$_POST['name1'];


    $arrival = $_POST['arrival'];
    $departure = $_POST['depart'];
   //echo "arrival= ".$arrival;
    $room_type = $_POST['room_type'];
      $tel = $_POST['tel'];
      $address=$_POST['address'];
    //before insertion check the types of rooms wanted in room-master and its availability in room-status
      $selected = mysql_select_db("room_master",$conn);//Selecting the database
      $ROOMNO_COUNT_SQL="SELECT * FROM room_master WHERE room_description='$room_type'";
      $roomno_rs =@mysql_query($ROOMNO_COUNT_SQL,$conn) or die ("could not execute ROOM NO COUNT FROM MASTER -- SQL query");
      $roomcount= mysql_num_rows($roomno_rs);

      if ($roomcount>0)
      {
      //check those room no's status (booked/cancelled) in room_status table;
      $allotment=0;
      	while ($row = mysql_fetch_array($roomno_rs))
      			{
      				$TROOMID=$row["ROOMID"];

      				//check the above room no's status for the given dates in room_status table
      				$selected1 = mysql_select_db("room_status",$conn);//Selecting the database

        				$roomstatus_COUNT_SQL="SELECT * FROM room_status WHERE ROOMID= '$TROOMID' and status='BOOKED' AND BOOKED_DATE_FROM>='$arrival' and BOOKED_DATE_TO<='$departure'";
      				$roomstatus_rs =@mysql_query($roomstatus_COUNT_SQL,$conn) or die ("could not execute ROOM status -- SQL query");
      				$roomstatuscount= mysql_num_rows($roomstatus_rs);
      				if ($roomstatuscount>0)
      					{
      					//that room is already booked for the asked new request's date
      					}
      				else
      					{
      					//do the allotment and exit all loops

      					  $selected = mysql_select_db("guestdetails2",$conn);//Selecting the database

                  $sql1="insert into guestdetails2(arrival_date,departure_date,room_type,phone_number,address, Personid) values('$arrival','$departure','$room_type','$tel','$address','$_SESSION[personid]')";


                  $rs=@mysql_query($sql1,$conn) or die ("Could not insert!");


                //  echo "<br/><p align='center'><font color=green size='6pt'> Submitted successfully!</font></p>";
                  $last_id=mysql_insert_id();
                 //echo "lastid= ".$last_id;

                 $sql2="insert into room_status(GID,STATUS,BOOKED_DATE_FROM,BOOKED_DATE_TO,ROOMID)
                          values('$last_id','BOOKED','$arrival','$departure','$TROOMID')";
                 $rs2=@mysql_query($sql2,$conn) or die ("Could not insert!");
               //echo "room allotted";

               $allotment=1;
               if($allotment==1)
               {
                 //sending email;

                   require 'phpmailer/PHPMailerAutoload.php';
                   $mail = new PHPMailer;
                   $mail->isSMTP();//if local host only...else dont
                   $mail->Host='smtp.gmail.com';
                   $mail->Port=587;
                   $mail->SMTPAuth=true;
                   $mail->SMTPSecure='tls';
                   $mail->Username='hotelresidencia30@gmail.com';
                   $mail->Password='residencia30$';
                   $mail->setFrom('hotelresidencia30@gmail.com');
                 //  $mail->AddAddress('meera_l@ymail.com');
                   $mail->AddAddress($query2);
                   $mail->addReplyto('hotelresidencia30@gmail.com');

                   $mail->isHTML(true);//MAIL USING HTML
                   $mail->Subject='Booking Confirmation';
                   $mail->Body='Greetings! <br/><br/> Your booking has been confirmed. We are eagerly awaiting your presence. Kindly Check your dashboard for more details. <br><br/><br/>Regards,<br/>Residencia ';
                   if(!$mail->send())
                   {
                     echo "Mail not sent";
                   }
                   else {
                      echo "<br/><p align='center'><font color=green size='5pt'>We have recieved your booking ! Kindly check your mail !</font></p>";
                      $_SESSION['room_type']=$room_type;
                      $_SESSION['arrival']=$arrival;
                      $_SESSION['departure']=$departure;
                  //    $_SESSION['status']=

                    //  echo "room type: ".$room_type;
                    //  echo "room type2: ".$_SESSION['room_type'];

          //one for status            $_SESSION['arrival']=$arrival;
                   }

               }
           break;
           } //else's end
         } //while
         if ($allotment==0) //to print regret msg if no rooms vacant
         {
           require 'phpmailer/PHPMailerAutoload.php';
           $mail = new PHPMailer;
           $mail->isSMTP();//if local host only...else dont
           $mail->Host='smtp.gmail.com';
           $mail->Port=587;
           $mail->SMTPAuth=true;
           $mail->SMTPSecure='tls';
           $mail->Username='hotelresidencia30@gmail.com';
           $mail->Password='residencia30$';
           $mail->setFrom('hotelresidencia30@gmail.com');
         //  $mail->AddAddress('meera_l@ymail.com');
           $mail->AddAddress($query2);
           $mail->addReplyto('hotelresidencia30@gmail.com');

           $mail->isHTML(true);//MAIL USING HTML
           $mail->Subject='Booking Regret';
           $mail->Body='Greetings! <br/><br/> We are sorry to inform you that we are booked for the dates you have requested. Kindly try for other dates.<br/><br/> <br>Regards,<br/>Residencia ';
           if(!$mail->send())
           {
             echo "Mail not sent";
           }
           else {
         echo "<p align='center'> <font color=red size='6pt'> Sorry, we are booked! Please try for different dates</font></p>";
         }
       }

    } //roomcount - master -if
    else // room count from master's else
    {
    echo "Room type wanted is not available in room_master;";
    }

  }
  ?>

  <div class="container eight">
   <p>Welcome  <?php echo $query ?>&nbsp!</p>


   <form action="guestdetails.php" method="post" autocomplete="off">
   <div class="container one">

     <div class="row">
       <div class="col-md-6">Arrival Date</div>
       <div class="col-md-6">Departure Date</div>
     </div>
     <div class ="row">
       <div class="col-md-6 input-container"><i class="fa fa-calendar icon"></i><input class="input-field" type="text" name="arrival" id="arrival" required/></div>
       <div class="col-md-6 input-container"><i class="fa fa-calendar icon"></i><input class="input-field" type="text" name="depart" id="depart" required/></div>
     </div>


<br/>
   <div class="row">

             <div class="col-md-3">
             <!--     <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td> -->
                   &nbsp<b>Room Type</b>
                 </div>
              <div class="col-md-5">
                   <select name="room_type" class="suit-select input-field" name="room_type" id="room_type" >

                       <option value="single">Single</option>
                       <option value="twin">Twin</option>
                       <option value="triple">Triple</option>
                       <option value="quad">Quad</option>
                   </select>

                 </div>

             </div>
<br/>

      <div class="row">
        <div class="col-md-3">
        <label for="ph"><b>&nbspPhone Number</b></label><br/></div>
        <div class="col-md-5">

          <input type="tel" placeholder="Phone Number" pattern="^\d{10}$"  name="tel" required>
          <br/>

      </div>
    </div>
  <br/>

  <div class="row">
    <div class="col-md-3">
    <label for="ph"><b>&nbspAddress</b></label><br/></div>
    <div class="col-md-9">
      <input type="text" placeholder="Address" name="address" required>
      <br/>
      <br/>
      <br/>

  </div>
</div>
<!-- BLOB!!
<div class="row">
  <div class="col-md-3">
  <label for="ph"><b>&nbspAddress</b></label><br/></div>
  <div class="col-md-5">
    <input type="tel" placeholder="Phone Number" name="ph" required>
    <br/>

</div>
</div>

<br/>-->
    <div class="row text-center">
      <div class="col-md-4"></div>

      <div class="col-md-4">

      <button type="submit" name="mybutton" class="btn btn-primary" id="mybutton">Submit</button></div>
      <div class="col-md-4"></div>

   </div>
 </div>

    </form>


  <br/>

  </div>
<br/>  <br/>
<footer class=" six">
  <div class="row">
    <div class="col-md-4"></div>

      <div class="col-md-4 text center">
          &nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
          <a href="#" class="fa seven fa-facebook"></a> &nbsp&nbsp
          <a href="#" class="fa seven fa-twitter"></a> &nbsp&nbsp
          <a href="#" class="fa seven fa-instagram"></a> &nbsp&nbsp
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
