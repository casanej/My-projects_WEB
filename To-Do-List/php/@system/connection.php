<?php
require_once("session_manager.php");

class Connect{
    protected function createConnection($typeConnect=0){
        switch($typeConnect){
            case 0:
                $dbURL = "mysql.hostinger.com.br";
                $dbUsername = "u778739886_rcbc";
                $dbPassword = "R@f@el2010rcbc";
                $dbDatabse = "u778739886_users";
                break;
            case 1:
                $dbURL = "192.168.1.127";
                $dbUsername = "root";
                $dbPassword = "";
                $dbDatabse = "todolist";
                break;
        }

        try {
            $conn = new PDO("mysql:dbname=$dbDatabse; host=$dbURL", "$dbUsername", "$dbPassword" );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $conn;
    }

    // TABLE CREATIONS
    private function createTablePrefab($typeTable){
        /* TABLE TYPES NAMES
        01 - Logins
        */

        $conn = $this->connection(1);
        $return = "";
        $table = "";

        switch($typeTable){
            case 0:
                $table = "CREATE TABLE `tblogins` (
                        	`number` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
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
                        	INDEX `number` (`number`))
                            COMMENT='Table contains users logins'
                            COLLATE='latin1_swedish_ci'
                            ENGINE=InnoDB;";
                break;
            default:
                $return = "Error: Table prefab non exist.";
                break;
        }

        if($table != ""){
            $stmt = $conn->prepare($table);
            $stmt->execute();
            $return = true;
        } else{
            $return .= " Table query not executed.";
        }

        $conn->close();

        return $return;
    }

    public function callCreateTablePrefab(int $typeTable){
        $return = "";
        if(is_int($typeTable)){
            $return = $this->createTablePrefab($typeTable);
        } else{
            $return = "Parameter inserted incorrectly: Integer Required.";
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
