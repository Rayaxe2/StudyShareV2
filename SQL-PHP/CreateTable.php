<?php
    include 'DBConnect.php';

    //Creates Accounts table
    $sql = "CREATE TABLE accounts (
            UserID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
            email VARCHAR(50) NOT NULL,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL,
            firstname VARCHAR(50) NOT NULL,
            surename VARCHAR(50) NOT NULL,
            userType ENUM('Admin', 'Teacher', 'Student') NOT NULL 
        )";
        
    //Messages for if it does/doesn't exist
    if (mysqli_query($con, $sql)) {
        echo "<br/>Table 'Accounts' created successfully <br/>";
    } 
    else {
        echo "<br/> Error creating table: " . mysqli_error($con) . "<br/>";
    }

    mysqli_close($con);
?>