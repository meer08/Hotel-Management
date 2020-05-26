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
    <title> Admin Panel </title>


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
  font-size: 25px;
  cursor: pointer;
  width: 100%;
}


/*  hover effect for buttons */
button:hover {
  opacity: 0.8;
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
  font-size: 30px;
  font-weight: bold;
}
.nine{
  font-family: 'Poiret One', cursive;
  font-size: 20px;
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
        <li><a href="logout.php"> Logout</a></li>
        </ul>
      </div>



  </nav>
  <br/><br/><br/><br/><br/>
  <form action="admin.php" method="post" autocomplete="off">
  <div class="container-fluid eight ">



<div class="container">
  <p> Welcome Admin !</p>
  <div class="container three four">
    <div class="row">
      <div class="col-md-3"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'viewrequest.php';" ><b>Process Request</b></button></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3 text-center"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'availablerooms.php';" ><b>View Available Rooms</b></button></div>
    </div>

    <div class="row">
      <div class="col-md-3"><button type="button" class="btn btn-outline-primary"><b>Room Master Maintainance</b></button></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3 text-center"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'receipt.php';"><b>Receipt Generation</b></button></div>
    </div>

    <div class="row">
      <div class="col-md-3"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'block_dates.php';"><b>Block Room</b></button></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3 text-center"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'release_block.php';"><b>Release Room</b></button></div>
    </div>
    <div class="row">
      <div class="col-md-3"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'oldrequest.php';"><b>View Old Request</b></button></div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
      <div class="col-md-3 text-center"><button type="button" class="btn btn-outline-primary" onclick="location.href = 'stayedppl.php';"><b>Stayed People List</b></button></div>
    </div>
</div>
</div>
  <br/><br/><br/><br/><br/><br/><br/><br/>
  <footer class="six">

  <div class="row">
    <div class="col-md-4"></div>

      <div class="col-md-4 text center">
          &nbsp&nbsp&nbsp&nbsp     &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp
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
</div>
</div>
  </footer>
  </body>
  </html>
