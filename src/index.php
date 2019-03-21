<?php 
include 'RegisteredUser.php';

session_start();
console_log($_SESSION);
$loginbtn;
$registeredUserObj;

if($_SESSION['logged_in'] == true){ //|| isset($_SESSION)
  $loginbtn = '<button class="btn" name="logout">Logout</button>';
  $registeredUserObj = new RegisteredUser;
  $registeredUserObj->setUserName($_SESSION['userName']);
  $_SESSION['registeredUser'] = $registeredUserObj;
}
else{
  $loginbtn = '<button class="btn" name="login">Login/SignUp</button>'; //if not logged in
}

if(isset($_POST['logout'])){
  $_SESSION['logged_in'] = false;
  $_SESSION['userName'] = false;
  $_SESSION['registeredUser'] = false;
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
