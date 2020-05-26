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
    <title> Sign Up </title>
<style>


form
{

  align: center;
  height: 65%;
  width: 30%;
  font-family: 'Poiret One', cursive;
  border: 3px solid #f1f1f1;
  padding: 20px 20px 20px 20px;
  font-size: 25px;
  font-weight: bold;
}
p{
  text-align:center;
  font-family: 'Poiret One', cursive;
  font-size: 30px;
  font-weight: bold;
}

input[type=email], input[type=password], input[type=tel], input[type=text]
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  box-sizing: border-box;
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
  padding-top: 70px;

}
span.psw {
  float: right;
  padding-top: 16px;
}

a:link {
  text-decoration: none;
}
.two{
  font-family: 'Poiret One', cursive;
  font-size: 25px;
  font-weight: bold;
  min-height: 128px;
  background-color: #eaf4f4;
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
          <li><a href="login.php" > Login</a></li>

        </ul>
      </div>



  </nav>




  <?php
  /*code to connect mysql database at local host*/
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

  $selected = mysql_select_db("signup",$conn);//Selecting the database

  //To enter the data into mysql
  if(isset($_POST['mybutton'])) //isset ensures values aren't empty
  {


    $email = $_POST['email'];
    $name1 = $_POST['name1'];
    $psw = $_POST['psw'];
    $count = mysql_query("select * from signup where Email='$email'");
  //To check if username exist

    if(mysql_num_rows($count)>0)
    {
      echo "<br/><p align='center'> <font color=red size='5pt'>This email is already registered!!</font></p>";
    }
    else
    {
     $sql1="insert into signup(Email,Name,Password) values('$_POST[email]','$_POST[name1]','$_POST[psw]')";
     $rs=@mysql_query($sql1,$conn) or die ("Could not insert!");

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
       $mail->AddAddress($email);
       $mail->addReplyto('hotelresidencia30@gmail.com');

       $mail->isHTML(true);//MAIL USING HTML
       $mail->Subject='Greetings! ';
       $mail->Body='Holla! <br/><br/><br/> Thankyou for registering with residencia. We are eagerly looking forward to serve you. Do visit our website or contact us through our email <br/> <br/></br/>Regards, <br/>Residencia. ';
       if(!$mail->send())
       {
         echo "Mail not sent";
       }
       else {
          echo "<br/><p align='center'><font color=green size='5pt'> Thankyou for registering with us !</font></p>";
       }





    }
  }

  ?>

<div class ="one">
<form action="signup.php" method="post" autocomplete="off">
          <div  class="container">
            <p>Sign Up </p>
            <br/>


              <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>



                <label for="name1"><b> Name </b></label>
                  <input type="text" placeholder="Name" name="name1" required>


              <label for="psw"><b>Password </b></label>
                <input type="password" placeholder="Password" name="psw" required>



            <button type="submit" name="mybutton" class="btn btn-primary">Sign Up</button>
            Have an account?<a href= "login.php"> Login</a>
          </div>

        </form>





</div>
<br/>
<br/>
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
