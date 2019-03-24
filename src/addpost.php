<?php
  //CheckLogin is included to see if the user is logged in
  //it redirects them to the index page with the sign in option if they are no logged in
  include_once 'CheckLogin.php';
  include_once 'RegisteredUser.php';
  include_once 'NavBarState.php';


  if(isset($_FILES['fileToUpload'])) {
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    
    $postTitle = $_POST['title'];
    $eduLevel = $_POST['eduLevel'];
    $subject = $_POST['subject'];

    upload($file_name, $file_size, $file_type, $file_tmp, $postTitle, $eduLevel, $subject);
    if($eduLevel=="A-Level"){
        header("Location: ./alevel.php"); 
    }
    else{
        header("Location: ./gcse.php"); 
    }
  }

  function upload($file_name,$file_size,$file_type,$file_tmp,$postTitle,$eduLevel,$subject){
      $username = $_SESSION['username'];
      echo '<script>';
      echo 'console.log('. json_encode( $_SESSION['registeredUser'] ) .')';
      echo '</script>';
      $registeredUserObj = unserialize($_SESSION['registeredUser']);
      $registeredUserObj->createNewPost($file_name, $file_size, $file_type, $file_tmp, $postTitle, $eduLevel, $subject);

  }

?>