<?php
    include 'Guest.php';
    
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['psw'];
        $firstname = $_POST['fname'];
        $surename = $_POST['sname'];
        $userType = $_POST['userType'];
        $rePassword = $_POST['psw-repeat'];

        $guestObj = new Guest;
        $RegResults = $guestObj->register($email, $username, $password, $firstname, $surename, $userType, $rePassword);

        echo $RegResults;
        if ($RegResults != 0) {
            include_once 'login.html';
            echo "<script>
            var ErrorSection = document.getElementById('RegisterError');
            ErrorSection.style.color = 'red';";
            switch ($RegResults) {
                case 1:
                    echo "ErrorSection.innerHTML += 'Required feilds are empty!';";
                    break;
                case 2:
                    echo "ErrorSection.innerHTML += 'Error: your email is invalid';";
                    break;
                case 3:
                    echo "ErrorSection.innerHTML += 'Error: Your password must be 8 characters long and have a specail character!';";
                    break;
                case 4:
                    echo "ErrorSection.innerHTML += 'Error: Your passwords do nots match';";
                    break;
                case 5:
                    echo "ErrorSection.innerHTML += 'Error: The username you selected is already in use';";
                    break;
                case 6:
                    echo "ErrorSection.innerHTML += 'Error: server error - please try again later';";
                    break;
                default:
                    echo "ErrorSection.innerHTML += 'Error: The fields were filled in incorrectly';";
                    break;
            }
            echo "document.getElementByName('email').value = '$email';
                document.getElementByName('username').value = '$username';
                document.getElementByName('fname').value = '$firstname';
                document.getElementByName('sname').value = '$surename';
                document.getElementByName('psd').value = '$password';
                document.getElementByName('psw-repeat').value = '$rePassword';";
                
        
        echo "</script>";

        setcookie("username", $username, time() + (86400 * 30), "/"); 
        setcookie("password", $password, time() + (86400 * 30), "/"); 
        */

        }
        else {
            header("Location: ./index.html");
        }
    }

    /*
    <script>
            var ErrorSection = document.getElementById('RegisterError');
            ErrorSection.style.color = 'red';
            document.getElementById('psw-repeat').text = '$rePassword';
    </script>
    */
?>