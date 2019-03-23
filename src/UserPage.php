<?php
session_start();
echo $_SESSION['loggedIn'];
  if(isset($_SESSION['loggedIn']) == false){
    header("location: index.php");
  }
  else {
    $username = $_SESSION['username'];
    $userType = $_SESSION['userType'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Study Share</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <form action="index.php" method="post">
    <div class="navbar">
      <ul>
        <li id="logo">Study Share</li>
        <li><a href="./index.html">Home</a></li>  
        <li id="LoginButton" style="float:right"><button class="btn" name="logout" id="logoutbtn">logout</button></li>
        <li id="Uploadbtn" style="float:right"></li>
      </ul>
    </div>
  </form>

  <center>
    <div class="UserPageDiv">
      <table class="UserTable" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);">
        <tr>
          <td colspan="2" align="right"> 
            <div class="dropdown">
              <button class="dropbtn">Dropdown</button>

              <div class="dropdown-content">
                <a href="#">Change password</a>
                <!--<a href="#">Link 2</a>-->
              </div>

            </div> 
          <td>
        </tr>
        <tr>
          <td><img src="DefaultProfilePic.png"/></td>
          <td>
            <table class="UserInfo">
              <tr>
                <td style="padding-bottom:0px;" colspan="2"><h2>Username placeholder</h2></td></tr>
              <tr>
                <td style="width:30%">Name:</td> 
                <td>Placeholder name </td></tr>
              <tr>
                <td>email:</td> 
                <td> Placeholder email</td></tr>
              <tr>
                <td>User Type:</td> 
                <td> Placeholder user type</td></tr>
            </table>
          </td>
        </tr>
      </table>
    </div>

    <div class="UserPageDiv" style="padding-top: 20px;">
      <div class="PostGrid" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);">
        <div class="grid-item">1</div>
        <div class="grid-item">2</div>
        <div class="grid-item">3</div>  
      </div>
    </div>


</center>

  

<!-- <div id="background" style="background-color:#F3F2F2;">
  <div id="mainPanel" style="width:500px; height:100%; margin:auto; background-color:white;" >
    <h2 style="text-align:center">YOUR ACCOUNT</h2>
    <img src="DefaultProfilePic.png" alt="USER PROFILE PIC" align="middle" style="width:100%; height:100%; margin:auto; ">
<div class="card">
  
  <h1 style="text-align:center">John Smith</h1>

  <table height=200px width=100% style="font-size:20px;">
    <h1>
      <tr>
        <td><b>User ID:</b></td>
        <td>13872</td>
      </tr>
      <tr>
        <td><b>Username:</b></td>
        <td>JohnS99</td>
      </tr>
      <tr>
        <td><b>Name:</b></td>
        <td>John Smith</td>
      </tr>
      <tr>
        <td><b>Admin Status:</b></td>
        <td>User is Admin</td>
      </tr>
    </h1>
  </table>
  </div>
</div>
</div> -->
  </body>
</html>
