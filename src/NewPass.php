<?php
include_once 'RegisteredUser.php';
include_once 'changePassword.php';

//THe 2 passwords inputed from the change password form are recored
$password = $_POST['psw'];
$rePassword = $_POST['psw-repeat'];

//Passwords don't match error messages are printed on the form to show when it's reloaded and the inputs are retained in the inputboxes
//Checks to see if the passwords match
if($password != $rePassword){
    echo "<script>
        document.getElementById('FormError').innerHTML = 'The passwords you enter do not match!'
        document.getElementById('FormError').style.color = 'red';
        document.getElementById('Newpsw-repeat').value = '$password';
        document.getElementById('Newgpsw').value = '$rePassword';
    </script>";
}

//Checks to see if the passwords is 8 characters long and has specail characters 
elseif((strlen($password) < 8) || (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-].*[0-9]|[0-9]/', $password)) == false){
    echo "<script>
        document.getElementById('FormError').innerHTML = 'Your password needs to contain 8 chatacters with atleast 1 specail character! please try again!'
        document.getElementById('FormError').style.color = 'red';
        document.getElementById('Newpsw-repeat').value = '$password';
        document.getElementById('Newgpsw').value = '$rePassword';
    </script>";
}
//If there are no problems the database entries for the user is changes to store it's new password
else {
    $RegisteredUserObj = new RegisteredUser();
    $result = $RegisteredUserObj->setPassword($password);
    if ($result){
        //redirct with confirmation message
        $RegisteredUserObj->console_log("Success changing password!");
        echo "<script>
            if (!alert('Password Successfully changed! Redirecting you to your user page.')){
                window.location.href = 'http://localhost/Study_Share_v2/src/UserPage.php';
            }
        </script>";
    }
    //for debuging 
    else {
        $RegisteredUserObj->console_log("Error changing password!");
    }
}
?>