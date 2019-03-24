<?php
include_once 'DataInterface.php';

$dataInterfaceObj = DataInterface::getInstance();
$posts = $dataInterfaceObj->getGCSEPosts();

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html class="no-js">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="main.css" />
  </head>

  <body>
  <form action="index.php" method="post">
      <div class="navbar">
        <ul>
          <li id="logo">Study Share</li>
          <li><a href="index.php">Home</a></li>  
          <li id="UserPageIcon" style="float:right;"></a></li>
          <li id="LoginButton" style="float:right"><button class="btn" name="login" id="loginbtn" style="width:250px;">Login/SignUp</button></li>
          <li id="Uploadbtn" style="float:right"></li>
        </ul>
      </div>
    </form>
      
      <div class="edutitle">
        <p>GCSE</p>
      </div>
      <div class="subBody"></div>

      <!--div class="card">
        <div class="cardcontainer">
          <a href="">Maths</a>
        </div>
      </div-->

      <div class="ques">
        <p class="">GCSE posts</+p>
      </div>

<?php
include_once 'NavBarState.php';
echo '<div class="UserPageDiv" style="padding-top: 20px;">';
    while($rows = mysqli_fetch_array($posts)) {
        console_log($rows['path']);
        echo'<div class="large-grid-item"><table><tr><td>'.$rows["title"].'</td></tr>
        <tr><td>upvote stuff</td></tr>
        <tr><td>';
        echo '<a href="download.php?file='.$rows["path"].'">Download Notes here</a>';
        echo '</td></tr></table></div>';

    }
  echo '</body></html>';
?>