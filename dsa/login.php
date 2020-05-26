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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="a.css">
    <title> Login </title>
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

input[type=email], input[type=password]
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
.nine{
  font-family: 'Poiret One', cursive;
  font-size: 20px;
  font-weight: bold;
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
          <li><a href="signup.php"> Sign Up </a> </li>

        </ul>
      </div>



  </nav>

    <?php
    SESSION_START();
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

    $selected = mysql_select_db("signup",$conn);//Selecting the database

    $email = $_POST['email'];
    $psw = $_POST['psw'];

    $count = mysql_query("select * from signup where Email='$email' and Password='$psw'");

      if(mysql_num_rows($count)==1)
      {

        $row = mysql_fetch_array($count);
         $_SESSION['email'] = $email;
         $_SESSION['name'] = $row['Name'];//storing name in a variable
         $_SESSION['personid']=$row['Personid'];

         $query = $_SESSION['name'];
         $query2 = $_SESSION['email'];
      //   echo $query;//returns the name of the user
          $_SESSION['varname']=$query;//doing this so that the value is passed on to the next page
          $_SESSION['varname2']=$query2;
      }else {

         echo "<br/><p align='center'> <font color=red size='5pt'>Invalid Credentials!!</font></p>";
      }
    }

    ?>

  <div class ="one">
<?php
if (isset($_SESSION['email']) and $_SESSION['email'] != 'hotelresidencia30@gmail.com' )
 {
  header("location: dashboard.php");
 }
//11-05-2020
 if (isset($_SESSION['email']) and $_SESSION['email'] == 'hotelresidencia30@gmail.com' )
 {
  header("location: admin.php");
 }

?>

    <form action="login.php" method="post">
    <div class="container">

            <p>Login </p>
            <br/>
            <label for="email"><b> Email </b></label>
              <input type="email" placeholder="Email" name='email' required>

            <label for="psw"><b>Password </b></label>
              <input type="password" placeholder="Password" name="psw" required>

            <button type="submit" name="mybutton" class="btn btn-primary" id="mybutton">Login</button>
               New User?<a href= "signup.php"> Sign Up </a>

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

</div>




</body>


</html>
