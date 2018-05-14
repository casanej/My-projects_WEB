<?php
require_once("session_manager.php");

class Connect{

    private $conn;

    public function __construct(){
        $typeConnect = 1;
        switch($typeConnect){
            case 0:
                $dbURL = "mysql.hostinger.com.br";
                $dbUsername = "u778739886_rcbc";
                $dbPassword = "R@f@el2010rcbc";
                $dbDatabse = "u778739886_users";
                break;
            case 1:
                $dbURL = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbDatabse = "todolist";
                break;
        }

        try {
            $this->conn = new PDO("mysql:dbname=$dbDatabse; host=$dbURL", "$dbUsername", "$dbPassword" );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $this->conn;
    }

    // TABLE CREATIONS
    public function createTablePrefab($typeTable){
        /* TABLE TYPES NAMES
            00 - Logs
            01 - Logins
        */

        $return = "";
        $table = "";

        switch($typeTable){
            case 0:
                $table = "CREATE TABLE `tblogs` (
                            `index` INT(11) NOT NULL,
                            `error` VARCHAR(64) NOT NULL,
                            `page` VARCHAR(64) NOT NULL,
                            `description` VARCHAR(256) NOT NULL,
                            `status` VARCHAR(32) NOT NULL,
                            `foundby` VARCHAR(64) NOT NULL,
                            `datecreate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                            `datechange` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            `addressip` VARCHAR(16) NOT NULL
                        )
                        ENGINE=InnoDB
                        ;";
                break;
            case 1:
                $table = "CREATE TABLE `tblogins` (
                        `number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `uuid` VARCHAR(32) NOT NULL,
                        `name` VARCHAR(128) NOT NULL,
                        `email` VARCHAR(64) NOT NULL,
                        `password` VARCHAR(64) NOT NULL,
                        `datecreate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `datechange` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `addressip` VARCHAR(16) NOT NULL,
                        `lastchange` VARCHAR(32) NOT NULL,
                        PRIMARY KEY (`uuid`),
                        UNIQUE INDEX `uuid` (`uuid`),
                        UNIQUE INDEX `email` (`email`),
                        INDEX `number` (`number`)
                    )
                    COMMENT='Table contains users logins'
                    COLLATE='latin1_swedish_ci'
                    ENGINE=InnoDB;";
                break;
            default:
                $return = "Error: Table prefab non exist.";
                break;
        }

        try {
            if($table != ""){
                $stmt = $this->conn->prepare($table);
                $stmt->execute();

                $stmt = null;
                $conn = null;

                $return = true;
            } else{
                $return .= " Table query not executed.";
            }
        }
        catch(PDOException $e) {
            $return = $e->getCode();
        }

        return $return;
    }
    // END TABLE CREATIONS
}

/*
//INSERT
$stmt = $conn->prepare("INSERT INTO database (campo1, campo2) VALUES (?, ?)");
$stmt = $conn->bind_param("ss", $campo1, $campo2); //s for String
$stmt = $con->execute();

//SELECT
$result = $conn->query("SELECT * FROM database");
while($row = $result->fetch_assoc())
*/
?>
