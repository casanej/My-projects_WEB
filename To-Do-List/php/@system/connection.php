<?php
require_once("session_manager.php");

class connect{
    protected connection($typeConnect=0){
        switch($typeConnect){
            case 0:
                $dbURL = "mysql.hostinger.com.br";
                $dbUsername = "u778739886_rcbc";
                $dbPassword = "R@f@el2010";
                $dbDatabse = "u778739886_users";
                break;
            case 1:
                $dbURL = "192.168.1.121";
                $dbUsername = "userLogin";
                $dbPassword = "R@f@el2010userLogin";
                $dbDatabse = "todolist";
                break;
        }

        $conn = new mysqli($dbURL, $dbUsername, $dbPassword, $dbDatabse);

        if($conn->connect_error){
            $error = "Error: ".$conn->connect_error;
        }
    }

    private createTablesPrefabs($typeTable){
        /* TABLE TYPES NAMES
        01 - Logins
        */

        switch($typeTable){
            case 1:
                $table = "CREATE TABLE `tblogins` (
                          `uuid` varchar(32) NOT NULL,
                          `nickname` varchar(32) NOT NULL,
                          `name` varchar(128) NOT NULL,
                          `email` varchar(64) NOT NULL,
                          `password` varchar(64) NOT NULL,
                          `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `datechange` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          `addressip` varchar(16) NOT NULL,
                          `lastchange` varchar(32) NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table contains users logins';"
                break;


        }
    }
}
?>
