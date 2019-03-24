<?php
  include_once 'RegisteredUser.php';

  if(isset($_SESSION) == false){
    session_start();
  }

  $loginbtn;
  $uploadBtn;
  $UserIcon;
  $registeredUserObj;
  
  if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    $loginbtn = '<button class="btn" name="login" id="loginbtn" style="width:250px;">Login/SignUp</button>';
    $UserIcon = '';
    $uploadBtn = "<a></a>"; 
    
    $_POST['logout'] = false;
  }
  
  if(isset($_SESSION['loggedIn'])){ 
    $loginbtn = '<button class="btn" name="logout" id="logoutbtn" style="width:250px;">logout</button>';
    $UserIcon = '<a style="padding:3px;" href="./UserPage.php"><img src="UserIcon.png" width="50" height="50"/></a>';
    $registeredUserObj = new RegisteredUser;

    $registeredUserObj->setUserName($_SESSION['username']);
    $registeredUserSerialize = serialize($registeredUserObj);
    $_SESSION['registeredUser'] = $registeredUserSerialize;
    $uploadBtn = "<a href=addpost.html>Upload Notes</a>"; 
  
    echo "<script>
      document.getElementById('loginbtn').remove;
      document.getElementById('LoginButton').innerHTML='$loginbtn';
      document.getElementById('Uploadbtn').innerHTML='$uploadBtn';
      document.getElementById('UserPageIcon').innerHTML='$UserIcon';
    </script>";
  }
  
  else{
    $loginbtn = '<button class="btn" name="login" id="loginbtn" style="width:250px;">Login/SignUp</button>';
    $UserIcon = '';
    $uploadBtn = "<a></a>"; 
  }
  
  if(isset($_POST['login']) && (isset($_SESSION['loggedIn'])==false)){
    header("location: login.php");
  }

?>