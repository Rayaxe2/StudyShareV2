<?php 
  include_once 'index.html';
  include_once 'NavBarState.php';

  if(isset($_POST['login']) && (isset($_SESSION['loggedIn'])==false)){
    header("location: login.php");
  }
?>