<?php 
include 'DataInterface.php';
class Guest {
    public function register($email, $username, $password, $firstname, $surename, $userType, $rePassword) {
        $dataInterfaceObj = DataInterface::getInstance();
        $con = $dataInterfaceObj->getConnection();
        return $dataInterfaceObj->storeNewUser($email, $username, $password, $firstname, $surename, $userType, $rePassword); 
    }
    
    public function login($username, $password) {
        $dataInterfaceObj = DataInterface::getInstance();
    
        //Checks if account exists, true or false
        $LoginResults = $dataInterfaceObj->searchUser($username, $password);
        return  $LoginResults;

    }
}
?>