<?php 
include 'RegisteredUser.php';

session_start();
console_log($_SESSION);
$loginbtn;
$registeredUserObj;

if(isset($_SESSION['loggedIn'])){ //|| isset($_SESSION)
  $loginbtn = '<button class="btn" name="logout">Logout</button>';
  $registeredUserObj = new RegisteredUser;
  $registeredUserObj->setUserName($_SESSION['username']);
  $_SESSION['registeredUser'] = $registeredUserObj;
}
else{
  $loginbtn = '<button class="btn" name="login">Login/SignUp</button>'; //if not logged in
}

if(isset($_POST['logout'])){
  session_start();
  session_unset();
  session_destroy();
  console_log("Logged out");
  $loginbtn = '<button class="btn" name="login">Login/SignUp</button>';
}

if(isset($_POST['login'])){
  header("location: login.php");
}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

include_once 'index.html';
 echo "<script>
    var EditVar = document.getElementById('LoginButton');
    EditVar.innerHTML='$loginbtn';
  </script>";

?>
