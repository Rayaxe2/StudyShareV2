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

        if ($RegResults != 7) {
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

            echo "document.getElementById('Regemail').value = '$email';
                document.getElementById('Regusername').value = '$username';
                document.getElementById('Regfname').value = '$firstname';
                document.getElementById('Regsname').value = '$surename';
                document.getElementById('Regpsw').value = '$password';
                document.getElementById('Regpsw-repeat').value = '$rePassword';";
            echo "</script>";
        }

        else {
            console_log($_SESSION);
            header("Location: ./index.php");
        }
    }

    function console_log($data){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

?>